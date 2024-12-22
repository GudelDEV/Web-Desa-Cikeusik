<?php
header('Content-Type: application/json');



include('../Components/conection.php');  // Pastikan path koneksi ke database benar

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data form
    $id_feedbak = $_POST['id_pengaduan'] ?? '';
    $penanggungJawab = trim($_POST['penanggungJawab'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $message = trim($_POST['message'] ?? '');


    // Validasi data
    if (empty($penanggungJawab) || empty($status) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }


    // Gunakan prepared statement untuk keamanan SQL
    $stmt = $conn->prepare("UPDATE pendaftaran SET nama_pjawab = ?, feedback_text = ?, status_feedback = ?, tanggal_pembaruan = NOW() WHERE id_daftar = ?");
    $stmt->bind_param('ssss', $penanggungJawab, $message, $status, $id_feedbak);

    // Cek apakah query berhasil
    if ($stmt->execute()) {
        // Kirim respons sukses
        echo json_encode(['status' => 'success', 'message' => 'Pengaduan berhasil dikirim']);
        exit;
    } else {
        // Kirim respons error jika query gagal
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $stmt->error]);
        exit;
    }

    // Tutup statement dan koneksi
    if (isset($stmt)) {
        $stmt->close();
    }
    
    // Jika $conn ada, tutup koneksi
    if (isset($conn)) {
        $conn->close();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
    exit;
}
?>