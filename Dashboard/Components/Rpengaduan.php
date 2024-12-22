<?php
include '../../Components/conection.php'; // Pastikan file koneksi database benar

if($_GET['id']){
    $id = $_GET['id'];
}


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Jumlah data per halaman
$offset = ($page - 1) * $limit;

// Query total data
$totalQuery = "SELECT COUNT(*) AS total FROM pengaduan";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];

// Hitung total halaman
$totalPages = ceil($totalData / $limit);

// Query data berita sesuai halaman
$query = "SELECT * FROM pengaduan ORDER BY tanggal_pengaduan DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$total_pengaduan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengaduan"))['total'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pengaduan PHP</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../node_modules/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../node_modules/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../node_modules/AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../../Asset/logo.png" alt="AdminLTELogo" width="100">
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
                <img src="../../Asset/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Desa Cikeusik</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">FITURE</li>
                        <li class="nav-item">
                            <a href="../admin.php?id=<?php echo urlencode($id) ?>" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Berita.php?id=<?php echo urlencode($id) ?>" class="nav-link">
                                <i class="nav-icon fas fa-regular fa-newspaper"></i>
                                <p>
                                    Berita
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="daftarWarga.php?id=<?php echo urlencode($id) ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-database"></i>
                                <p>
                                    Data Warga
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mitra.php?id=<?php echo urlencode($id) ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-file"></i>
                                <p>
                                    Data Mitra
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Rpengaduan.php?id=<?php echo urlencode($id) ?>" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Riwayat Pengaduan</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="Rsaran.php?id=<?php echo urlencode($id) ?>" class="nav-link"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Saran Warga</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Pendaftaran.php?id=<?php echo urlencode($id) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pendaftaran</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Pektp.php?id=<?php echo urlencode($id) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembuatan E-KTP</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="nav-item nav-link btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#modalLogout" data-action="logout">
                        Logout
                    </button>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Konten disini -->
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Riwayat Pengaduan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="#">Pengaduan</a></li>
                                <li class="breadcrumb-item ">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Table--Start -->
            <section class="content">
                <!-- InfoBox-Start -->
                <section class="container-fluid">
                    <section class="box">
                        <div class="info-box" style="width: 300px;">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Pengaduan Desa </span>
                                <span class="info-box-number">
                                    <?php echo $total_pengaduan ?>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </section>
                </section>
                <!-- InfoBox-End -->
                <!-- Data Berita - Start -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pengaduan Desa Cikeusik</h3>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No-Telphone</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php foreach ($data as $index => $item): ?>
                                <tr>
                                    <td><?= $index + 1 + $offset; ?></td>
                                    <td><?= htmlspecialchars($item['nama']); ?></td>
                                    <td><?= htmlspecialchars($item['email']); ?></td>
                                    <td><?= htmlspecialchars($item['number_telephone']); ?></td>
                                    <td><?= htmlspecialchars($item['kategori']); ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($item['tanggal_pengaduan'])) ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-lihat" data-id="<?= $item['id']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#modalLaunch">Lihat</a>
                                        <a href="#" class="btn btn-secondary btn-feedback" data-id="<?= $item['id']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#modalLaunch">Feedback</a>
                                    </td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- Modal-Lihat-Start -->
                    <section>
                        <div class="modal fade" id="modalLaunch" tabindex="-1" aria-labelledby="modalLaunchLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLaunchLabel">Data Pengadu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="pengaduanForm" method="POST" enctype="multipart/form-data">
                                            <!-- Nama Pengadu -->
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Pengadu</label>
                                                <input type="text" class="form-control" id="nama" name="nama" disabled>
                                            </div>

                                            <!-- Kategori Pengaduan -->
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <input type="text" class="form-control text-white" id="kategori"
                                                    name="kategori">
                                            </div>

                                            <!-- Detail Pengaduan -->
                                            <section class="mb-3">
                                                <label for="pengaduan" class="form-label">Pengaduan Detail</label>
                                                <textarea class="form-control" id="pengaduan" rows="3"
                                                    name="message"></textarea>
                                            </section>

                                            <!-- Gambar Pengaduan -->
                                            <div class="mb-3">
                                                <h4 class="h5 fw-bolder">Gambar</h4>
                                                <img src="" alt="gambar1" id="gambar1" style="max-width: 100%;">
                                            </div>

                                        </form>

                                    </div>
                                    <section class="modal-footer">
                                        <button type="button" class="btn btn-outline-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-outline-light btn-submit d-none"
                                            name="kirim">Kirim</button>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Modal-feeback -->
                </div>
                <!-- Daftar Berita - End -->
            </section>

            <!-- Table--End -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal - Start-->
        <section>
            <div class="modal fade " id="modalLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="h5 fw-bolder modal-title" style="color: White;" id="titleModal">Logout</h5>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <section class="modal-body" id="modalContent">
                            Apakah Kamu Yakin Akan Keluar

                        </section>
                        <section class="modal-footer">
                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                            <a href="../../PHP/logout.php" class="btn btn-outline-light" id="btnLogout">Logout</a>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal - End-->



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
    <script src="../../node_modules/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../../node_modules/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- overlayScrollbars -->
    <script src="../../node_modules/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../node_modules/AdminLTE/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../../node_modules/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../node_modules/AdminLTE/plugins/raphael/raphael.min.js"></script>
    <script src="../../node_modules/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../node_modules/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../../node_modules/AdminLTE/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../../node_modules/AdminLTE/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../node_modules/AdminLTE/dist/js/pages/dashboard2.js"></script>
    <!-- My js -->
    <script src="../JS/proses_pengaduan.js"></script>
    <script src=" ../JS/pagination.js"></script>
</body>

</html>