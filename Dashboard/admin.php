<?php
session_start();
include '../Components/conection.php';

if($_GET['id']){
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengakses WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['status'])) {
    header(header: "Location: ../Components/Login.php");
    exit();
}

// Opsional: Cek apakah status sesuai dengan halaman
if ($_SESSION['status'] != 'admin') {
    echo '<script>alert("Anda tidak memiliki akses ke halaman ini!");</script>';
    header(header: "Location: ../Components/Login.php");
    exit();
}

// Untuk Menghitung MailBox
$total_pengaduan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengaduan"))['total'];
$total_saran_warga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM saran_warga"))['total'];
$total_ktp_warga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM ktp_warga"))['total'];
$total_pendaftaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pendaftaran"))['total'];

$total_email = $total_pengaduan + $total_saran_warga + $total_ktp_warga + $total_pendaftaran;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

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
                <span class="brand-text font-weight-light">Desa Cikeusik</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 position-relative">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">FITURE</li>
                        <li class="nav-item">
                            <a href="admin.php?id=<?php echo urlencode(string: $id) ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Components/Berita.php?id=<?php echo urlencode(string: $id) ?>" class="nav-link">
                                <i class="nav-icon fas fa-regular fa-newspaper"></i>
                                <p>
                                    Berita
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Components/daftarWarga.php?id=<?php echo urlencode(string: $id) ?>"
                                class="nav-link">
                                <i class="nav-icon fas fa-solid fa-database"></i>
                                <p>
                                    Data Warga
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Components/mitra.php?id=<?php echo urlencode(string: $id) ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-file"></i>
                                <p>
                                    Data Mitra
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Components/Rpengaduan.php?id=<?php echo urlencode($id)?>" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./Components/Rpengaduan.php?id=<?php echo urlencode($id)?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Riwayat Pengaduan</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="./Components/Rsaran.php?id=<?php echo urlencode($id)?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Saran Warga</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./Components/Pendaftaran.php?id=<?php echo urlencode($id)?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pendaftaran</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./Components/Pektp.php?id=<?php echo urlencode($id)?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembuatan E-KTP</p>
                                        <span class="badge badge-info right "
                                            style="margin-left: -100px !important; ">2</span>
                                    </a>
                                </li>
                            </ul>
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
                                <li class="breadcrumb-item active"><a href="../index.php">Home</a></li>
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
                                        <?php echo $row['username'] ?>
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
                                    <span class="info-box-text">Status</span>
                                    <span class="info-box-number"><?php echo $row['status'] ?></span>
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
                                        class="fas fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Email</span>
                                    <span class="info-box-number"><?php echo $total_email  ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">New Members</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- Infor boxes-end -->
                    <!-- Map-row-start -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-7">
                            <!-- MAP & BOX PANE -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Cikeusik-Kuningan Report</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="d-md-flex">
                                        <div class="p-1 flex-fill" style="overflow: hidden">
                                            <!-- Map will be created here -->
                                            <div id="world-map-markers" style="height: 659px; overflow: hidden">
                                                <div class="map">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.861983981491!2d108.67246219392861!3d-6.954287388735267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0e9134e5952d%3A0xf9f05cfe58ca0853!2sCikeusik%2C%20Kec.%20Cidahu%2C%20Kabupaten%20Kuningan%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1732695385336!5m2!1sid!2sid"
                                                        width="100%" height="659px" style="border:0;"
                                                        allowfullscreen="true" loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.d-md-flex -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="col-md-5">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Pie Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card direct-chat direct-chat-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Direct Chat</h3>

                                    <div class="card-tools">
                                        <span title="3 New Messages" class="badge badge-warning">3</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" title="Contacts"
                                            data-widget="chat-pane-toggle">
                                            <i class="fas fa-comments"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">
                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="../Asset/admin.png"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->

                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="../Asset/admin.png"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->

                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="../Asset/admin.png"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                Working with AdminLTE on a great new app! Wanna join?
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->

                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="../Asset/admin.png"
                                                alt="message user image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                I would love to.
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->

                                    </div>
                                    <!--/.direct-chat-messages-->

                                    <!-- Contacts are loaded here -->
                                    <div class="direct-chat-contacts">
                                        <ul class="contacts-list">
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Count Dracula
                                                            <small
                                                                class="contacts-list-date float-right">2/28/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">How have you been? I
                                                            was...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Sarah Doe
                                                            <small
                                                                class="contacts-list-date float-right">2/23/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">I will be waiting for...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Nadia Jolie
                                                            <small
                                                                class="contacts-list-date float-right">2/20/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">I'll call you back at...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Nora S. Vans
                                                            <small
                                                                class="contacts-list-date float-right">2/10/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Where is your new...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            John K.
                                                            <small
                                                                class="contacts-list-date float-right">1/27/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Can I take a look at...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../Asset/admin.png"
                                                        alt="User Avatar">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Kenneth M.
                                                            <small
                                                                class="contacts-list-date float-right">1/4/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Never mind I found...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                        </ul>
                                        <!-- /.contacts-list -->
                                    </div>
                                    <!-- /.direct-chat-pane -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Type Message ..."
                                                class="form-control">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-warning">Send</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </section>
                    </div>
                    <!-- Map-row-end -->
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
    <script src="./JS/admin.js"></script>
</body>

</html>