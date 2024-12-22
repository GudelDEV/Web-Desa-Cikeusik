<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/mitra.css">
</head>

<body>
    <?php  
        include 'NavBar.php';
    ?>
    <!-- Main-Start -->
    <main class="mt-5">
        <section class="container">
            <section class="row">
                <section class="col-6">
                    <section class="box">
                        <h1 class="h1 fw-bolder" style="color: #1599A3;">Kolaborasi Warga dan Desa: Promosikan Toko
                            Lokal,
                            Majukan Ekonomi Kita</h1>
                        <p style="font-size: 20px;">Pemerintah desa dan warga kini bersatu untuk mendukung kemajuan
                            ekonomi
                            lokal. Melalui website ini, toko-toko warga akan tampil lebih luas, memudahkan masyarakat
                            sekitar menemukan produk dan layanan terbaik dari desa kita.
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#mitraModal">
                            Ajukan Mitra
                        </button>

                    </section>
                </section>
                <section class="col-6 ">
                    <section class="banner ms-5">
                        <img src="../Asset/banner.png" alt="Banner 1" width="500px" class="shadow ">
                    </section>
                </section>
            </section>

            <!-- Modal-Start -->
            <div class="modal fade" id="mitraModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form form method="POST" enctype="multipart/form-data" id="formMitra">
                                <div class="mb-3">
                                    <label for="nama_pemilik" class="form-label">Owner</label>
                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_toko" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_tele pon" name="nomor_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" class="form-control" id="website" name="website">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btnMitra">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal-End -->
        </section>

        <!-- PopUp-Start -->
        <section class="container d-flex justify-content-center align-items-center"
            style="width: 100%; height: 100vh; position: absolute; background-color: transparent; top: 0; left: 0; right: 0; bottom: 0; z-index: -1000;"
            id="parrentPopUp">
            <section class="popUp p-3 shadow" style="width: 400px; background-color: white; opacity: 0;"
                id="popUpContent">
                <section class="modal-content">
                    <section class="modal-header">
                        <h5 class="h5 fw-bolder modal-title" style="color: green;" id="titlePopup">
                            Berhasil Dafatr sebagai mitra
                        </h5>
                    </section>
                    <section class="modal-body">
                        <p id="information">Kamu berhasil daftar sebgai mitra silakan tunggu untuk mendafatkan feedback
                            akun untuk login</p>
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
        <!-- PopUp-End -->

    </main>
    <!-- Main-End -->
    <?php  
        include 'Footer.php';
     ?>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../JS/mitra.js"></script>
</body>

</html>