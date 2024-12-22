<?php
ob_clean();  // Bersihkan output buffer sebelum mengirimkan respons JSON
header('Content-Type: application/json');

// Koneksi ke database
include('../Components/conection.php');

// Debugging Input (Tampilkan data POST)
error_reporting(E_ALL);
ini_set('display_errors', 1);
file_put_contents('php://stderr', print_r($_POST, true)); // Debug POST data

// Periksa koneksi ke database
if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Koneksi ke database gagal']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_pengaduan = trim($_POST['id_pengaduan'] ?? '');
    $penanggungJawab = trim($_POST['penanggungJawab'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi input
    if (empty($id_pengaduan) || empty($penanggungJawab) || empty($status) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Semua field wajib diisi.']);
        exit;
    }

    // Validasi ID pengaduan (harus berupa angka)
    if (!is_numeric($id_pengaduan)) {
        echo json_encode(['success' => false, 'message' => 'ID pengaduan harus berupa angka.']);
        exit;
    }

    // Cek apakah ID pengaduan ada di database
    $result = mysqli_query($conn , "SELECT penangung_jawab, feedback_text, status_feedback, tanggal_update FROM saran_warga WHERE id_saran = '$id_pengaduan'");
    if (mysqli_num_rows($result) == 0) {
        echo json_encode(['success' => false, 'message' => 'ID pengaduan tidak ditemukan']);
        exit;
    }

    // Gunakan prepared statement untuk mengupdate data
    $stmt = $conn->prepare("UPDATE saran_warga SET penangung_jawab = ?, feedback_text = ?, status_feedback = ?, tanggal_update = NOW() WHERE id_saran = ?");
    $stmt->bind_param('ssss', $penanggungJawab, $message, $status, $id_pengaduan);

    // Cek apakah query berhasil
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Pengaduan berhasil diperbarui.']);
    } else {
        // Jika gagal, tampilkan pesan error
        echo json_encode(['success' => false, 'message' => 'Gagal memperbarui pengaduan: ' . $stmt->error]);
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika request bukan POST, kirim pesan error
    echo json_encode(['success' => false, 'message' => 'Request tidak valid']);
}

ob_end_flush(); // Mengirimkan output buffer dan mengakhiri skrip PHP
?>