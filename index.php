<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="./Style/index.css">

</head>

<body>
    <!-- Header Start -->
    <header class="position-relative container" style="width: 100%; height: 100vh;" id="header">
        <!-- Navbar Start -->
        <nav id="navbar">
            <section class="container d-flex align-items-center justify-content-between" style="height: 70px;">
                <section style="display: flex; align-items: center;">
                    <img src="./Asset/logo.png" alt="Logo" width="80px">
                    <a style="font-weight: bolder; margin-left: -10px; position: relative;"
                        class="fs-6 text-decoration-none text-white">Cikeusik</a>
                </section>
                <section class="item mt-3 fs-6 me-4 text-white">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="nav-link fw-bold text-decoration-underline"
                                aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="list-inline-item"><a class="nav-link" href="./Components/Berita.php">Berita</a></li>
                        <li class="list-inline-item"><a class="nav-link" href="./Components/Layanan.php">Layanan</a>
                        </li>
                        <li class="list-inline-item"><a class="nav-link" href="./Components/Mitra.php">Mitra</a></li>
                        <li class="list-inline-item"><a class="nav-link" href="./Components/Belanja.php">Belanja</a>
                        </li>
                        <li class="list-inline-item"><a class="nav-link" href="./Components/Login.php">Login</a>
                        </li>
                    </ul>
                </section>
            </section>
        </nav>

        <!-- Navbar End -->
        <!-- Carousel Start -->
        <section style="margin-top: -70px;" id="banner">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./Asset/image1.jpg" class="d-block w-100" alt="image1">
                    </div>
                    <div class="carousel-item">
                        <img src="./Asset/image2.jpg" class="d-block w-100" alt="image2">
                    </div>
                    <div class="carousel-item">
                        <img src="./Asset/image3.jpeg" class="d-block w-100" alt="image3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </section>
        <!-- Carousel End -->
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <!-- Jelajahi-Desa Start -->
        <section class="container mt-5">
            <section class="row justify-content-center align-items-center">
                <section class="col-6">
                    <section class="text">
                        <h1 class="h1 fw-bolder " style="color: #1599A3;">Jelajahi Desa Cikeusik</h1>
                        <p style="font-size: 20px;">
                            Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa. Aspek
                            pemerintahan, penduduk, Sejarah Desa , Profil Desa, dan juga berita tentang Desa.
                        </p>
                    </section>
                </section>
                <section class="col-6 mt-5">
                    <section class="d-flex flex-wrap gap-2">
                        <section class="img-thumbnail">
                            <img src="./Asset/mitra.jpg" alt="" class="img-fluid image-icon" width="300px">
                            <h5 class="text-center mt-2">Mitra</h5>
                        </section>
                        <section class="img-thumbnail">
                            <img src="./Asset/news.jpg" alt="" class="img-fluid image-icon" width="300px">
                            <h5 class="text-center mt-1">Berita</h5>
                        </section>
                        <section class="img-thumbnail">
                            <img src="./Asset/surat.jpg" alt="" class="img-fluid image-icon" width="300px">
                            <h5 class="text-center mt-2">Pengaduan</h5>
                        </section>
                        <section class="img-thumbnail">
                            <img src="./Asset/shooping.jpg" alt="" class="img-fluid image-icon" width="300px">
                            <h5 class="text-center mt-2">Belanja</h5>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- Jelajahi-Desa End -->

        <!-- Informasi-Desa Start -->
        <section class="container mt-5" style="background-color: #1599A3;">
            <section class="row justify-content-center align-items-center">
                <!-- Kolom untuk Gambar -->
                <section class="col-5 text-center">
                    <section class="img">
                        <img src="./Asset/logo.png" alt="" width="600px" class="img-fluid">
                    </section>
                </section>
                <!-- Kolom untuk Teks -->
                <section class="col mt-3">
                    <section class="text">
                        <h1 class="h1 fw-bolder" style="color: white;">Informasi Desa Cikeusik</h1>
                        <p style="color: white; font-size: 20px;">Informasi Desa Cikeusik Yang Dibuat
                            Berdasarkan Informasi Terkini</p>
                        <p class="text-white" style="font-size: 18px; line-height: 27.9px;">
                            <strong>Visi dan Misi Pekon Podomoro (2015-2021)</strong> berfokus pada pembangunan yang
                            merata di berbagai sektor.
                            Prioritas utama pembangunan meliputi pengadaan dan perbaikan sarana infrastruktur, seperti
                            jalan dan irigasi perdesaan,
                            serta peningkatan hasil pertanian melalui teknologi tepat guna. Selain itu, pengembangan
                            sarana prasarana pasar pekon,
                            fasilitas olahraga, dan peningkatan potensi lahan pertanian menjadi fokus utama. Peningkatan
                            kapasitas masyarakat dalam
                            bidang pembibitan pertanian, permodalan untuk mengoptimalkan lahan tidur, serta pengelolaan
                            usaha dan keterampilan
                            sumber daya manusia juga menjadi bagian penting dalam misi ini. Selain itu, ada upaya untuk
                            meningkatkan kesadaran
                            masyarakat dalam menjaga kesehatan lingkungan dan pendidikan agama, serta memperbaiki
                            perumahan sehat. Seluruh
                            pencapaian tersebut akan dilaksanakan dengan melibatkan partisipasi aktif dari masyarakat
                            melalui perencanaan dan
                            pelaksanaan yang bersifat partisipatif.
                        </p>
                    </section>
                </section>
            </section>
        </section>
        <!-- Informasi-Desa End -->
        <!-- Administrasi Penduduk Start -->
        <section class="container " style="margin-top: 80px;">
            <section class="text">
                <h1 class="h1 fw-bolder" style="color: #1599A3;">Administrasi Penduduk</h1>
                <p style="font-size: 20px;">Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi
                    terkait dengan kependudukan
                    dan pendayagunaannya untuk pelayanan publik yang efektif dan efisien
                </p>
            </section>
            <section class="d-flex flex-wrap gap-4" style="margin-top: 60px;">
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">2.944</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Penduduk</h3>
                    </section>
                </section>
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">1553</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Laki-Laki</h3>
                    </section>
                </section>
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">400</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Kepala Keluarga
                        </h3>
                    </section>
                </section>
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">1391</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Perempuan</h3>
                    </section>
                </section>
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">60</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Penduduk Sementara
                        </h3>
                    </section>
                </section>
                <section style="width: 600px;"
                    class="d-flex text-center gap-1 align-items-center justify-content-center">
                    <section style="width: 300px; background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); ; height: 68px;"
                        class="d-flex align-items-center justify-content-center">
                        <h2 class="fw-bold text-white">8</h2>
                    </section>
                    <section style="width: 300px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); height: 68px;"
                        class="d-flex justify-content-center align-content-center">
                        <h3 class="fw-bold " style="color: #3d3b3b; line-height: 68px; opacity: 0.8;">Mutasi Penduduk
                        </h3>
                    </section>
                </section>
            </section>
        </section>
        <!-- Administrasi Penduduk End -->

        <!-- APB-DESA START -->
        <section class="container " style="margin-top: 100px;">
            <section class="row">
                <section class="col-6">
                    <section class="img">
                        <img src="./Asset/apb.png" alt="" class="img-fluid" width="500px">
                    </section>
                </section>
                <section class="col-6">
                    <section class="text">
                        <h1 class="h1 fw-bolder" style="color: #1599A3;">APB DESA CIKEUSIK</h1>
                        <p style="font-size: 20px;">Akses cepat dan transparan terhadap APB Desa serta proyek
                            pembangunan
                        </p>
                    </section>
                    <section class="box card ps-4 pt-2 mt-3
                    " style="width: 680px; height: 120px;">
                        <p style="font-size: 18px; opacity: 0.5;" class="fw-bold">Pendapatan Desa</p>
                        <h1 style="font-size: 44px; opacity: 0.8;" class="fw-bold text-end me-2">Rp4.802.205.800,00</h1>
                    </section>
                    <section class="box card ps-4 pt-2 mt-3" style="width: 680px; height: 120px;">
                        <p style="font-size: 18px; opacity: 0.5;" class="fw-bold">Belanja Desa</p>
                        <h1 style="font-size: 44px; opacity: 0.8;" class="fw-bold text-end me-2">Rp4.888.222.678,00</h1>
                    </section>
                </section>
            </section>
        </section>
        <!-- APB-DESA END -->

        <!-- Berita-Desa-Start -->
        <section class="container" style="margin-top: 80px;">
            <section class="text">
                <h1 class="h1 fw-bolder" style="color: #1599A3;">BERITA DESA CIKEUSIK</h1>
                <p style="font-size: 20px;">Menyajikan informasi terbaru tentang peristiwa, berita terkini, Data
                    Anggaran dan
                    artikel-artikel jurnalistik dari Desa Cikeusik
                </p>
            </section>
            <section class="row" style="gap: 16px 0px;">
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="card" style="width: 400px;">
                        <img src="./Asset/bimbingan.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Teknis Smart Village Se- Kecamatan Cidahu</h5>
                            <p class="card-text">Selasa, tanggal 11 Juli 2023, Operator Smartvillage, Staff Pemerintahan
                                Desa se- Kecamatan Ciwaru mengikuti Bimbingan Teknis yang dilaksanakan di Aula Desa
                                Cidahu untuk lebih mengenal dan memahami fitur-fitur aplikasi seperti mengolah data
                                pemerintahan, data kependudukan, profil Desa, dan lain-lain.</p>
                            <section class="information d-flex justify-content-between align-items-center">
                                <a href="#" class="btn text-white " style="background-color: #1599A3;">Baca Lebih
                                    Lanjut</a>
                                <section class="date d-flex justify-content-center align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1599A3"
                                        class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                    </svg>
                                    <p class=" mt-3" style="color: blue;">11 Juli 2023</p>
                                </section>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <!-- Berita-Desa-End -->

        <!-- Potensi-Desa-Start -->
        <section class="container" style="margin-top: 80px;">
            <section class="text">
                <h1 class="h1 fw-bolder" style="color: #1599A3;">POTENSI DESA CIKEUSIK</h1>
                <p style="font-size: 20px;">Informasi tentang potensi dan kemajuan Desa di berbagai bidang seperti

                    ekonomi, <br> pariwisata, pertanian, industri kreatif, dan kelestarian lingkungan
                </p>
            </section>
            <section class="content">
                <swiper-container class="mySwiper" slides-per-view="3" centered-slides="true" space-between="30"
                    pagination="true" pagination-type="fraction" navigation="true">
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/peternak-burung.jpeg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Peternak Burung</h5>
                                <p class="card-text">Di Podomoro sebagian masyrakat memliki berbagai jenis burung dan
                                    paling banyak adalah jenis burung lovebird. Karena, burung jenis burung ini
                                    mempunyai nilai jual yang cukup tinggi berkisar 100-450 ribu. Sehingga banyak
                                    masyarakat desa tertetarik ukntuk memelihara dan mengembangbiakan burung untuk di
                                    perjual belikan.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/tempe.jpg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Produksi Tempe</h5>
                                <p class="card-text">Di podomoro terdapat sekitar rumah produksi tempe yang setiap
                                    harinya dapat memproduksi tempe dengan bahan dasar kedelai sebanyak /hari setiap
                                    rumahnya. Hasil produksi tempe kemudian didistribusikan ke perusahaan oleh-oleh
                                    makanan, ke rumah makan, sampai ke warung-warung. Penghasilan para pengusaha tempe
                                    berkisar juta per-bulan.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/olahan_tempe.jpg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Produksi Olahan Tempe</h5>
                                <p class="card-text">Kini tempe tidak hanya diolah menjadi makanan pendamping nasi saja,
                                    melainkan saat ini banyak produsen olahan makanan yang berkreasi menjadikan tempe
                                    sebagai olahan yang menarik seperti keripik tempe dengan berbagai rasa mulai dari
                                    yang original sampai yang pedas. Rumah produksi kreasi olahan tempe tersebut
                                    terletak di pekon podomora, kurang lebih terdapat rumah produksi.

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/petani_bawang.jpeg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">petani bawang merahnya,</h5>
                                <p class="card-text">pekon podomoro sekarang terkenal dengan penghasil bawang merahnya,
                                    banyak warga pekon podomoro bercocok tanam bawang merah karena dalam perawatannya
                                    tidak cukup sulit dan memiliki harga jual cukup relative stabil di pasaran. para
                                    petani di pekon podomoro dapat memanen 100 kg bawang merah dengan luas tanah kurang
                                    lebih ? , keuntungan yang diperoleh dapat mencapai sekitar ? juta dalam sekali
                                    panen.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/pengrajin_gerabah.jpg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Pengrajin Gerabah</h5>
                                <p class="card-text">kerajinan gerabah yang terbuat dari tanah liat sekarang sudah mulai
                                    langka, tetapi hal tersebut tidak terjadi di pekon podomoro karena masih banyak
                                    warga di pekon podomoro yang memproduksi kerajinan gerabah yang terbuat dari tanah.
                                    dalam proses pembuatan memang membutuhkan waktu yang cukup lama, hal ini dikarenakan
                                    penggunaan alat dan proses pengolahannya yang masih tradisional.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/ipal.png" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Ipal Konunal</h5>
                                <p class="card-text">ipal komunal atau yang sering disebut septic tank merupakan
                                    instalasi pengolahan air limbah seperti limbah dari WC, air cuci/kamar mandi. ipal
                                    komunal yang berada di pekon podomoro di bangun oleh ??? yang terletak di?????,
                                    pembangunan ipal konumal bertujuann untuk menjaga kesehatan dan lingkungan warga
                                    pekon podomoro, serta dapat menambah estetika, karena pembagunan ipal komunal
                                    disertai dengan tempat bermain dan tanaman bunga.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/pasar_asem.jpg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Pasar Asem</h5>
                                <p class="card-text">pasar asem merupakan pasar pagi yang terdapat di pekon podomoro
                                    terletak di dekat kantor kelurahan podomoro. pasar asem setiap pagi ramai dikunjungi
                                    warga pekon podomoro maupun warga di luar pekon. pedagang di pasar asem banyak
                                    didominasi warga podomoro, hal ini dikarenakn warga pekon podomoro selain berpofesi
                                    sebagai petani tetapi juga sebagai pedagang.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/peternak_jangkrik.jpg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Peternak Jangkrik</h5>
                                <p class="card-text">beternak jangkrik kini banyak digeluti oleh warga pekon podomoro,
                                    kurang lebih terdapat 10 orang yang berternak, hal ini dikarenakan dalam
                                    perawatannya jangkrik tidak begitu merepotkan dan penghasilan yang diperoleh cukup
                                    besar yaitu berkisar 2-3 juta per bulan dalam ? kandang jangkrik.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                    <swiper-slide>
                        <section class="card" style="width: 400px;">
                            <img src="./Asset/image3.jpeg" class="card-img-top" alt style="height: 200px;">
                            <section class="card-body">
                                <h5 class="card-title">Bendungan Cikeusik</h5>
                                <p class="card-text">bendungan bukit bintang merupakan penampungan air yang dibangun
                                    oleh pemerintah guna untuk memberdayakan warga pekon podomoro khususnya pada bidang
                                    pertanian. bendungan bakit bintang selain dimanfaatkan sebagai saluran irigasi dapat
                                    pula dijadikan sebagai tempat untuk bersua foto dan tempat untuk mengusik kejenuhan
                                    seperti memancing bagi penggemar para pemancing.
                                </p>

                            </section>
                        </section>
                    </swiper-slide>
                </swiper-container>
            </section>
        </section>
        <!-- Potensi-Desa-End -->

        <!-- Alamat-Desa-Start -->
        <section class="container" style="margin-top: 80px;">
            <section class="text">
                <h1 class="h1 fw-bolder" style="color: #1599A3;">PETA DESA CIKEUSIK</h1>
                <p style="font-size: 20px;">Menampilkan Peta Desa Dengan Interest Point Desa Kersik
                </p>
            </section>
            <section class="content">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.861983981491!2d108.67246219392861!3d-6.954287388735267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0e9134e5952d%3A0xf9f05cfe58ca0853!2sCikeusik%2C%20Cidahu%2C%20Kuningan%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1732360587628!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="container-fluid"></iframe>
            </section>
        </section>
        <!-- Alamat-Desa-End -->


    </main>
    <!-- Main End -->

    <!-- Footer-Start -->
    <footer class="container footer " style="background: rgb(21,153,163);
background: linear-gradient(90deg, rgba(21,153,163,1) 0%, rgba(212,236,243,1) 100%); color:
     #fff; padding: 20px; text-align: center; margin-top: 80px; border-radius: 10px 10px 0 0;">
        <section class="row">
            <section class="col-md-3">
                <section class="imgage d-flex">
                    <img src="./Asset/logo.png" alt="" width="150px" height="100px">
                    <section style="margin-left: -5px;" class="text-start">
                        <h6 class="fw-bolder fs-5">Desa Cikeusik</h6>
                        <h6 class="fw-bold fs-6">Kecamatan Cidahu</h6>
                        <h6 class="fw-bold fs-6">Kabupaten Kuningan</h6>
                        <h6 class="fw-bold fs-6">Provinsi Jawa Barat</h6>
                    </section>
                </section>
                <section class="media-sosial" style="position: relative; margin-left: -150px;">
                    <h6 class="fw-bolder fs-5 mt-4">Media Sosial</h6>
                    <section class="icon" style="position: relative; margin-left: 70px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-facebook ms-3" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-twitter-x ms-3" viewBox="0 0 16 16">
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-instagram ms-3" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-youtube ms-3" viewBox="0 0 16 16">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-tiktok ms-3" viewBox="0 0 16 16">
                            <path
                                d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                        </svg>
                    </section>
                </section>
            </section>
            <section class="col-md-3">
                <h6 class="fw-bold text-start">Kontak Desa</h6>
                <section class="mt-2 text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-telephone"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>
                    <span class="text-black ms-2"> 0812 1234 5678
                    </span>
                </section>
                <section class="mt-2 text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-envelope"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                    <span class="text-black ms-2"> gudeldeveloper@gmail.com</span>
                    </span>
                </section>
                <section class="mt-2 text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-clock"
                        viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <span class="text-black ms-2"> Jam Operasional (07:00 - 17:00)</span>
                    </span>
                </section>
                <section class="mt-2 text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-house"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                    <span class="text-black ms-2">Gedung ( Jalan Cikeusik - Kec. Cidahu)</span>
                    </span>
                </section>
            </section>
            <section class="col-md-3">
                <h6 class="fw-bold text-start">Nomor Telephon Pentig</h6>

                <section class="text-start text-black mt-4">
                    <section class="">BOY RUSDI / Kades Cikeusik</section>
                    <p>089583949499</p>
                </section>
                <section class="text-start text-black mt-4">
                    <section class="">SUPRATMAN / Ambulan Desa</section>
                    <p>089627484293</p>
                </section>
            </section>
            <section class="col-md-3">
                <h6 class="fw-bold text-start ms-3">Jelajahi-Desa</h6>
                <ul class="text-start" style="color: black;">
                    <li><a href="" class="text-decoration-none text-black">Website Kemendesa</a></li>
                    <li><a href="" class="text-decoration-none text-black">Website Kemendegari</a></li>
                    <li><a href="" class="text-decoration-none text-black">Website Kecamatan Cidahu</a></li>
                    <li><a href="" class="text-decoration-none text-black">Cek DPT Online</a></li>
                </ul>
            </section>
        </section>

    </footer>
    <section class="container text-center text-white fw-bold"
        style="background-color: #1599A3; position: relative; width: 100%; height: 80px;">
        <h5 style="line-height: 80px;"> &copy; 2024 Your Company Name. All rights reserved.</h5>
    </section>

    <!-- Footer-End -->

    <script src="./node_modules/swiper/swiper-element-bundle.min.js"></script>
    <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./JS/index.js"></script>
</body>

</html>