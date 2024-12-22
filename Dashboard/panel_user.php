<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header(header: "Location: ../Components/Login.php");
    exit();
}

include '../Components/conection.php';

if($_GET['id']){
    $id = $_GET['id'];
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Jumlah data per halaman
$offset = ($page - 1) * $limit;

// Query total data
$totalQuery = "SELECT COUNT(*) AS total FROM produk WHERE id_product = $id";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];

// Hitung total halaman
$totalPages = ceil($totalData / $limit);

// Query data Produk sesuai halaman
$query = "SELECT * FROM produk ORDER BY id_product DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

// Pastikan $produk didefinisikan sebagai array
$produk = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $produk[] = $row;
    }
}


// Ambil data user mitra
$sql = "SELECT * FROM mitra WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

// ambil total produk jumlah produk berdarskan id
$total_produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk WHERE id_product = $id"))['total'];
$total_pesanan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk WHERE pesanan = $id"))['total'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../node_modules/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../node_modules/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../node_modules/AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../Asset/logo.png" alt="AdminLTELogo" width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../Asset/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Mitra Desa Cikeusik</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 position-relative">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">FITURE</li>
                        <li class="nav-item">
                            <a href="panel_user.php?id=<?php echo urlencode(string: $id) ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <button type="button" class="nav-item nav-link btn btn-secondary" data-toggle="modal"
                        data-target="#logout">
                        Logout
                    </button>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dasboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="../index.php">Dashboard</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Username</span>
                                    <span class="info-box-number">
                                        <?php echo $data['nama'] ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Produk</span>
                                    <span class="info-box-number"><?php echo $total_produk ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pesanan</span>
                                    <span class="info-box-number"><?php echo $total_pesanan  ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="40" fill="white" class="bi bi-shop"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                                    </svg></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Nama Toko</span>
                                    <span class="info-box-number"><?php echo $data['toko'] ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- Infor boxes-end -->
                    <!-- Table Produk Start -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Product</h3>
                            <div class="card-tools">
                                <ul id="pagination" class="pagination pagination-sm float-right">
                                    <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $page - 1; ?>">&laquo;</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= $page == $totalPages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $page + 1; ?>">&raquo;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Judul Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Pesanan</th>
                                        <th>Stok</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    <?php foreach ($produk as $index => $item): ?>
                                    <tr>
                                        <td><?=  $index + 1 + $offset ; ?></td>
                                        <td><?= htmlspecialchars($item['nama_produk']); ?></td>
                                        <td><?= htmlspecialchars($item['judul_produk']); ?></td>
                                        <td><?= htmlspecialchars($item['harga_produk']); ?></td>
                                        <td><?= htmlspecialchars($item['pesanan']); ?></td>
                                        <td><?= htmlspecialchars($item['stock']); ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-edit" data-id="<?= $item['id']; ?>"
                                                data-toggle="modal" data-target="#modalEdit">Edit</a>
                                            <a href="#" class="btn btn-warning btnDelete "
                                                data-id="<?= $item['id']; ?>">Remove</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body editModal">
                                            <!-- Konten Akan Disi Oleh Javascript -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Table-Produk ENd -->

                <!-- Butoon Tambah Produk - Start -->
                <section class="content">
                    <!-- Button trigger modal -->
                    <!-- Tombol Pemicu Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProduk">
                        Tambahkan Produk
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalProduk" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" id="formProduk">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Masukkan nama Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Masukkan Judul Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga"
                                                placeholder="Masukkan Harga Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">STOCK</label>
                                            <input type="number" class="form-control" id="stock" name="stock"
                                                placeholder="Masukkan Jumlah Stok">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lampiran" class="form-label">Gambar Produk</label>
                                            <input class="form-control" type="file" id="lampiran" name="lampiran[]"
                                                multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alasan" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                placeholder="deskripsi"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaToko" class="form-label">Nama Toko</label>
                                            <input type="text" class="form-control" id="namaToko" name="namaToko"
                                                value="<?php echo $data['toko'] ?>" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="almat" name="alamat"
                                                value="<?php echo $data['alamat'] ?>" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">No-telpon</label>
                                            <input type="tel" class="form-control" id="telphone" name="telephone"
                                                value="<?php echo $data['number_telphone'] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-secondary" data-id="<?php echo $id ?>"
                                                id="addProduct">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- Butoon Tambah Produk - end -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal Logout - Start-->
    <section>
        <div class="modal fade" id="logout">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                    <div class="modal-header">
                        <h4 class="modal-title">Logout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Kamu Ingin Keluar?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <a href="../PHP/logout.php" class="btn btn-outline-light">Logout</a>
                    </div>
                </div>
    </section>
    <!-- Modal Logout - End-->
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../node_modules/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../node_modules/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../node_modules/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../node_modules/AdminLTE/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../node_modules/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../node_modules/AdminLTE/plugins/raphael/raphael.min.js"></script>
    <script src="../node_modules/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../node_modules/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../node_modules/AdminLTE/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../node_modules/AdminLTE/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../node_modules/adminlte/dist/js/pages/dashboard2.js"></script>
    <!-- My js -->
    <script src="./JS/panel_user.js"></script>
    <script src="./JS/pagination.js"></script>

</body>

</html>