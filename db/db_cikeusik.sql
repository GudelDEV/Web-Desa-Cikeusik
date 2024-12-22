-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 03:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cikeusik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_warga`
--

CREATE TABLE `daftar_warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jk_kelamin` enum('Perempuan','Laki-Laki') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `jenis_pendaftaran` enum('penduduk baru','migrasi masuk') NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_warga`
--

INSERT INTO `daftar_warga` (`id`, `nama`, `nik`, `jk_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `jenis_pendaftaran`, `tanggal`) VALUES
(15, 'Syaidina Ali', '3208098590008500', 'Laki-Laki', '2024-12-02', 'Kuningan , Jawabarat', 'Kuningan Jawabarat', '089668075292', 'penduduk baru', '2024-12-02 17:26:00'),
(16, 'Syaidina', '3208098590008500', 'Laki-Laki', '2024-10-01', 'Kuningan , Jawabarat', 'lololl', '0899699994949', '', '2024-12-02 18:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `fb_pengaduan`
--

CREATE TABLE `fb_pengaduan` (
  `id` int(11) NOT NULL,
  `nama_pengadu` varchar(30) NOT NULL,
  `ulasan_pengadu` text NOT NULL,
  `tanggal_pengadu` date NOT NULL,
  `kategori_pengadu` enum('Umum','Sosial','Keamanan','Kebersihan','Kesehatan') NOT NULL,
  `image_pengadu` varchar(255) NOT NULL,
  `nama_pjawab` varchar(30) NOT NULL,
  `ulasan_pjawab` text NOT NULL,
  `status_pengaduan` enum('Pengaduan Diterima','Sedang Dikerjakan','Sukses') NOT NULL,
  `image_pjawab` varchar(255) NOT NULL,
  `tanggal_fb` datetime NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fb_pengaduan`
--

INSERT INTO `fb_pengaduan` (`id`, `nama_pengadu`, `ulasan_pengadu`, `tanggal_pengadu`, `kategori_pengadu`, `image_pengadu`, `nama_pjawab`, `ulasan_pjawab`, `status_pengaduan`, `image_pjawab`, `tanggal_fb`, `id_pengaduan`) VALUES
(1, 'Rizki', 'Di desa mukaraja telah kejadian kebakaran tolong kami mengharapkan bantuan dari desa', '2024-11-30', 'Umum', 'kebakaran.jpg', 'lll', 'llll', 'Pengaduan Diterima', 'sampah.jpg', '2024-11-30 04:56:04', 44),
(2, 'sayidina', 'pppppp', '2024-12-02', 'Keamanan', 'Screenshot_2024-12-01_153528.png', 'lope', '30000', 'Pengaduan Diterima', 'besi.jpg', '2024-12-02 16:58:22', 45);

-- --------------------------------------------------------

--
-- Table structure for table `ktp_warga`
--

CREATE TABLE `ktp_warga` (
  `id_list` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Konghucu','dll') NOT NULL,
  `status_perkawinan` enum('Belum Menikah','Sudah Menikah') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `foto_diri` varchar(255) NOT NULL,
  `no_kk` char(16) NOT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_pjawab` varchar(30) NOT NULL,
  `feedback_text` text NOT NULL,
  `status_feedback` enum('Pengaduan Diterima','Sedang Dikerjakan','Sukses') NOT NULL,
  `tanggal_pembaruan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ktp_warga`
--

INSERT INTO `ktp_warga` (`id_list`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `foto_diri`, `no_kk`, `tanggal_daftar`, `nama_pjawab`, `feedback_text`, `status_feedback`, `tanggal_pembaruan`) VALUES
(1, '3208098590008500', 'Syaidina', 'Kuningan , Jawabarat', '2006-08-01', 'laki-laki', 'Kec. Lebakwangi , Kamp Bojong , RT12 , RW4, Kab. Kuningan, Prov. Jawabarat', '089668075292', 'Islam', 'Belum Menikah', 'Pelajar', 'WNI', 'Screenshot_(15).png', '3208084969493000', '2024-11-26 23:25:30', 'Gudel', 'lol', 'Sukses', '2024-11-30 14:57:01'),
(2, '3208098590008500', 'Wili Mar\'ah', 'Kuningan , Jawabarat', '2004-12-02', 'perempuan', 'ppp', '0987', 'Kristen', 'Sudah Menikah', 'nganggur', 'WNI', 'Screenshot_2024-12-01_135732.png', '3208084969493000', '2024-12-02 16:37:48', '', '', 'Pengaduan Diterima', '2024-12-02 16:37:48'),
(3, '3208098590008500', 'Wili Mar\'ah', 'Kuningan , Jawabarat', '2001-02-02', 'perempuan', 'llll', '089668075292', 'Kristen', 'Belum Menikah', 'Pelajar', 'wnl', 'sampah.jpg', '3208084969493000', '2024-12-02 16:47:34', 'Sayidina', 'kokoko', 'Sukses', '2024-12-02 17:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `toko` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `number_telphone` varchar(16) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `toko`, `alamat`, `deskripsi`, `number_telphone`, `website`) VALUES
(1, 'Syaidina', 'Gudeldeveloper', 'Kamp. Bojong , Lebakwangi , Kuningan , Jawabarat', 'Pembuatan Sofware , Hardware , Webdeveloper', '089668075292', 'next'),
(2, 'WILI', 'TOKO BUNDA', 'Kamp. Bojong , Lebakwangi , Kuningan , Jawabarat', 'LOLOLOLO', '089668075292', 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `artikel` text NOT NULL,
  `image_list` varchar(255) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `artikel`, `image_list`, `penulis`, `tanggal`) VALUES
(40, 'Pemerkosaan di cikeusik', 'Kebakaran Didesa Cikeusik', 'developer.jpg', 'SAYIDINA', '2024-12-02 16:54:34'),
(42, 'Kebakaran Di Desa Cikeusik', 'loll', 'kebakaran.jpg', 'SYAIDINA', '2024-12-02 16:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` char(16) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jenis_daftar` enum('penduduk baru','migrasi masuk','lainnya') NOT NULL,
  `alasan` text NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_pjawab` varchar(30) NOT NULL,
  `feedback_text` text NOT NULL,
  `status_feedback` enum('Pengaduan Diterima','Sedang Dikerjakan','Sukses') NOT NULL,
  `tanggal_pembaruan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `nama`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `jenis_daftar`, `alasan`, `dokumen`, `tanggal_daftar`, `nama_pjawab`, `feedback_text`, `status_feedback`, `tanggal_pembaruan`) VALUES
(1, 'Syaidina', '3208098590008500', 'laki-laki', '2006-08-01', 'Kuningan , Jawabarat', 'Kuningan , Jawabarat', '089668075292', 'penduduk baru', 'Belum Terdaftar', 'Screenshot_2024-11-25_231829.png', '2024-11-30 11:25:07', '', '', 'Pengaduan Diterima', '2024-11-30 13:02:09'),
(2, 'Wili Mar\'ah', '3208098598508400', 'perempuan', '2004-06-12', 'Kuningan , Jawabarat', 'Mulyajaya , Desa cikeusik , Kuningan , Jawabarat', '0899699994949', 'penduduk baru', 'Belum terdaftar padahal sudah memiliki e-ktp', 'Screenshot_2024-11-25_231829.png', '2024-11-30 11:26:44', 'Gudel', 'lol', 'Sedang Dikerjakan', '2024-11-30 14:47:10'),
(3, 'Syaidina', '3208098590008500', 'laki-laki', '2024-10-01', 'Kuningan , Jawabarat', 'lololl', '0899699994949', 'migrasi masuk', 'kkkk', 'besi.jpg', '2024-12-02 16:45:42', '', '', 'Pengaduan Diterima', '2024-12-02 16:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number_telephone` varchar(14) NOT NULL,
  `kategori` enum('Umum','Sosial','Keamanan','Kebersihan','Kesehatan') NOT NULL,
  `image_list` varchar(255) NOT NULL,
  `pengaduan` varchar(255) NOT NULL,
  `tanggal_pengaduan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `email`, `number_telephone`, `kategori`, `image_list`, `pengaduan`, `tanggal_pengaduan`) VALUES
(43, 'Syadina Ali', 'kazeali657@gmail.com', '089668075292', 'Kebersihan', 'sampah.jpg', 'Di desa cikeusik kampung rancakek mengalami pemampetan sungan yang di sebabkan oleh pembengkakan sampah . Kami Harap Pemerintah Desa Kami mentindaklanjuti', '2024-11-29 22:58:13'),
(44, 'Rizki', 'syahiyaofficialid@gmail.com', '085768979975', 'Sosial', 'kebakaran.jpg', 'Di desa mukaraja telah kejadian kebakaran tolong kami mengharapkan bantuan dari desa', '2024-11-30 02:10:52'),
(45, 'sayidina', 'kazeali657@gmail.com', '089668075292', 'Keamanan', 'Screenshot_2024-12-01_153528.png', 'pppppp', '2024-12-02 16:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengakses`
--

CREATE TABLE `pengakses` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` enum('developer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengakses`
--

INSERT INTO `pengakses` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'developer', '12345', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `judul_produk` varchar(70) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `image_produk` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL,
  `pesanan` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `judul_produk`, `harga_produk`, `nama_toko`, `alamat`, `no_telpon`, `stock`, `image_produk`, `id_product`, `pesanan`, `deskripsi_produk`) VALUES
(1, 'Fullstak Developer', 'Pembuatan Aplikasi', 300000, 'Gudel Developer', 'Kuningan', '89668075', '10', 'developer.jpg', 1, 1, ''),
(6, 'Sabun Mandi', 'Sabun Mandi Wangi', 45000, 'TOKO BUNDA', 'Kamp. Bojong , Lebakwangi , Kuningan , Jawabarat', '089668075292', '100', 'image1.png', 2, 0, 'lolololo');

-- --------------------------------------------------------

--
-- Table structure for table `saran_warga`
--

CREATE TABLE `saran_warga` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` enum('Peningkatan Pelayanan Publik','Pengelolaan Lingkungan','Pengembangan Infrastruktur','Pemberdayaan Masyarakat','dll') NOT NULL,
  `image_lampiran` varchar(255) NOT NULL,
  `privasi` enum('tampilkan','anonim') NOT NULL,
  `tanggal_saran` datetime NOT NULL DEFAULT current_timestamp(),
  `penangung_jawab` varchar(30) NOT NULL,
  `feedback_text` text NOT NULL,
  `status_feedback` enum('Saran Diterima','Sedang Meninjau','Sukses','Ditolak') NOT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran_warga`
--

INSERT INTO `saran_warga` (`id_saran`, `nama`, `alamat`, `telepon`, `judul`, `deskripsi`, `kategori`, `image_lampiran`, `privasi`, `tanggal_saran`, `penangung_jawab`, `feedback_text`, `status_feedback`, `tanggal_update`) VALUES
(13, 'anonim', 'lolollll', '0899699994949', 'Kebakaran Di Desa Cikeusik', 'lllllllll', 'Peningkatan Pelayanan Publik', 'Screenshot_2024-12-01_121653.png', 'anonim', '2024-12-02 16:44:06', '', '', 'Saran Diterima', '2024-12-02 16:44:06'),
(14, 'gudel', 'lolollll', '0899699994949', 'Kebakaran Di Desa Cikeusik', 'lllllllll', 'Peningkatan Pelayanan Publik', 'Screenshot_2024-11-25_231829.png', '', '2024-12-02 16:44:44', '', '', 'Saran Diterima', '2024-12-02 16:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_acount` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_acount`, `id_account`) VALUES
(4, 'sayidina', '$2y$10$6rGh0dAPuefFUNYyDa.Yj.KI.Et0dEfS4q9a5SQ9eVzTDWPw8hqFi', 1),
(5, 'wili', '$2y$10$8mKJ2BJ95EO42mglluD4peoCr4wA6B5w3jHgn0i1HNFOx1oZF59/e', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_warga`
--
ALTER TABLE `daftar_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_pengaduan`
--
ALTER TABLE `fb_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ktp_warga`
--
ALTER TABLE `ktp_warga`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengakses`
--
ALTER TABLE `pengakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran_warga`
--
ALTER TABLE `saran_warga`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_warga`
--
ALTER TABLE `daftar_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fb_pengaduan`
--
ALTER TABLE `fb_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ktp_warga`
--
ALTER TABLE `ktp_warga`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengakses`
--
ALTER TABLE `pengakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saran_warga`
--
ALTER TABLE `saran_warga`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
