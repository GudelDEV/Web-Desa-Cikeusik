<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/layanan.css">
</head>

<body>
    <?php  
        include "Navbar.php";
    ?>
    <!-- Main-Start -->
    <main class="mt-5 position-relative">
        <!-- Text-Start -->
        <section class="text container">
            <h1 class="h1 fw-bolder" style="color: #1599A3;">LAYANAN DESA CIKEUSIK</h1>
            <p style="font-size: 20px;">Desa kami menyediakan berbagai layanan untuk memudahkan
                interaksi dan kebutuhan
                masyarakat. <br> Berikut adalah beberapa layanan yang tersedia:
            </p>
        </section>
        <!-- Text-End -->

        <!-- Button-Riwayat-Start -->
        <section class="button-riwayat container mt-2 mb-4">
            <a class="btn btn-primary" href="#" role="button">Riwayat Pengaduan</a>
            <a class="btn btn-secondary" href="#" role="button">Riwayat Saran</a>
            <a class="btn btn-success" href="#" role="button">Riwayat Pendaftaran</a>
            <a class="btn btn-warning" href="#" role="button">Riwayat Pembuatan KTP</a>
        </section>
        <!-- Button-Riwayat-END -->

        <!-- Layanan Start -->
        <section class="container">
            <section class="row row-gap-4">
                <section class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold">
                            Pengaduan
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pengaduan Terhadap Desa Cikeusik</h5>
                            <p class="card-text">Kami mendengarkan setiap keluhan dan pengaduan Anda. Jika Anda memiliki
                                masalah atau hal yang perlu disampaikan, silakan gunakan fitur pengaduan untuk
                                melaporkan isu-isu yang ada di desa. Kami berkomitmen untuk segera menindaklanjuti dan
                                menyelesaikan setiap permasalahan demi kenyamanan bersama..</p>
                            <button class="btn btn-primary" data-layanan="pengaduan" data-bs-toggle="modal"
                                data-bs-target="#modalLayanan">Pengaduan</button>
                        </div>
                    </div>
                </section>
                <section class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold">
                            Saran
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Saran Terhadap Desa Cikeusik</h5>
                            <p class="card-text">Desa kami selalu terbuka untuk masukan dan saran dari masyarakat. Jika
                                Anda memiliki ide atau usulan yang dapat meningkatkan pelayanan atau kondisi desa, kami
                                sangat menghargai kontribusi Anda. Berikan saran Anda untuk bersama-sama membangun desa
                                yang lebih baik.</p>
                            <button class="btn btn-secondary" data-layanan="saran" data-bs-toggle="modal"
                                data-bs-target="#modalLayanan">Saran</button>
                        </div>
                    </div>
                </section>
                <section class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold">
                            Pendaftaran
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Sebagai Warga Cikeusik</h5>
                            <p class="card-text">Untuk kemudahan administrasi, kami menyediakan layanan pendaftaran
                                warga secara online. Baik untuk pendatang baru atau perubahan data, Anda dapat melakukan
                                pendaftaran dengan mudah dan cepat melalui sistem yang telah disediakan.</p>
                            <button class="btn btn-success" data-layanan="pendaftaran" data-bs-toggle="modal"
                                data-bs-target="#modalLayanan">Pendaftaran</button>
                        </div>
                    </div>
                </section>
                <section class="col-5">
                    <div class="card">
                        <div class="card-header fw-bold">
                            Pembuatan KTP
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pembuatan Kartu Tanda Penduduk (KTP)</h5>
                            <p class="card-text">Desa kami menyediakan layanan pembuatan KTP untuk warga yang memenuhi
                                syarat. KTP adalah identitas resmi yang memungkinkan warga mengakses layanan publik,
                                seperti kesehatan, pendidikan, dan berbagai keperluan administratif lainnya.</p>
                            <button class="btn btn-warning" data-layanan="ktp" data-bs-toggle="modal"
                                data-bs-target="#modalLayanan">Ajukan</button>
                        </div>
                    </div>
                </section>
            </section>
            <!-- Modal-Start -->
            <div class="modal fade " id="modalLayanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="h5 fw-bolder modal-title" style="color: #1599A3;">FORM PENGADUAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <section class="modal-body" id="modalContent">
                            <!-- Konten Modal Disini -->

                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal-End -->
        </section>
        </section>
        <!-- Layanan End -->

        <!-- Popup-start -->
        <section class="container d-flex justify-content-center align-items-center"
            style="width: 100%; height: 100vh; position: absolute; background-color: transparent; top: 0; left: 0; right: 0; bottom: 0; z-index: -1000;"
            id="parrentPopUp">
            <section class="popUp p-3 shadow" style="width: 400px; background-color: white; opacity: 0;"
                id="popUpContent">
                <section class="modal-content">
                    <section class="modal-header">
                        <h5 class="h5 fw-bolder modal-title" style="color: green;" id="titlePopup">
                            Berhasil Mengajukan Pengaduan
                        </h5>
                    </section>
                    <section class="modal-body">
                        <p id="information"></p>
                    </section>
                    <section class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close"
                            id="close">Close
                            <i class="fas fa-times"></i>
                        </button>
                    </section>
                </section>
            </section>
        </section>
        <!-- Popup-end -->
    </main>
    <!-- Main-End -->
    <?php  
        include "Footer.php";
     
     ?>

    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../JS/layanan.js"></script>
</body>

</html>