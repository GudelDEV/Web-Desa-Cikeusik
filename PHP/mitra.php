<?php  
header('Content-Type: application/json');
include('../Components/conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil input dari form
    $pemilik = trim($_POST['nama_pemilik'] ?? '');
    $toko = trim($_POST['nama_toko'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $telphone = trim($_POST['nomor_telepon'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? ''); // Diperbaiki dari 'deskrpisi'

    // Validasi input
    if (empty($pemilik) || empty($toko) || empty($alamat) || empty($telphone) || empty($deskripsi) || empty($website)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Validasi nomor telepon
    if (!preg_match('/^[0-9]+$/', $telphone)) {
        echo json_encode(['status' => 'error', 'message' => 'Nomor telepon tidak valid']);
        exit;
    }

    // Siapkan statement untuk keamanan SQL
    $stmt = $conn->prepare("INSERT INTO mitra (nama, toko, alamat, deskripsi, number_telphone, website) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Error preparing query: ' . $conn->error]);
        exit;
    }

    // Ikat parameter (nama pemilik, toko, alamat, deskripsi, nomor telepon, website)
    $stmt->bind_param('ssssss', $pemilik, $toko, $alamat, $deskripsi, $telphone, $website);

    // Eksekusi query
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Kamu berhasil daftar sebgai mitra silakan tunggu untuk mendafatkan feedback akun untuk login']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $stmt->error]);
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
}
?>