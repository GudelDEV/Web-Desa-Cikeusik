<?php
header('Content-Type: application/json');
include('../Components/conection.php');  // Pastikan path koneksi ke database benar

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data form dan filter input
    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $nik = htmlspecialchars($_POST['nik'] ?? '');
    $jenis_kelamin = htmlspecialchars($_POST['jk_kelamin'] ?? '');
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir'] ?? '');
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir'] ?? '');
    $alamat = htmlspecialchars($_POST['alamat'] ?? '');
    $jenis_pendaftaran = htmlspecialchars($_POST['telepon'] ?? '');
    $telepon = htmlspecialchars($_POST['telepon'] ?? '');

    // Validasi data
    if (
        empty($nama) || empty($nik) || empty($jenis_kelamin) ||
        empty($telepon) || empty($tanggal_lahir) || empty($alamat) ||
        empty($jenis_pendaftaran) || empty($tempat_lahir)
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Gunakan prepared statement untuk keamanan SQL
    $stmt = $conn->prepare(
        "INSERT INTO daftar_warga 
        (nama, nik, jk_kelamin, tanggal_lahir, tempat_lahir, alamat, telepon, jenis_pendaftaran, tanggal)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())",
    );

    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare statement gagal: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param(
        'ssssssss', 
        $nama, $nik, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $alamat, $telepon, $jenis_pendaftaran
    );

    // Cek apakah query berhasil
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Pengaduan berhasil dikirim']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $stmt->error]);
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
    exit;
}
?>