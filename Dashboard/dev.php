<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header(header: "Location: ../Components/Login.php");
    exit();
}

// Opsional: Cek apakah status sesuai dengan halaman
// if ($_SESSION['status'] != 'admin') {
//     echo '<script>alert("Anda tidak memiliki akses ke halaman ini!");</script>';
//     header(header: "Location: ../Components/Login.php");
//     exit();
// }

// Jika lolos, tampilkan konten halaman admin
echo "Selamat datang, " . htmlspecialchars($_SESSION['username']) . "!";
?>