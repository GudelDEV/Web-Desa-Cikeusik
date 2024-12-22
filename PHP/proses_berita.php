<?php
header('Content-Type: application/json');
include('../Components/conection.php'); // Pastikan path koneksi benar

// Aktifkan debugging untuk menangkap error
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $penulis = trim($_POST['penulis'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Memastikan form terisi semua
    if (empty($judul) || empty($penulis) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Penanganan file lampiran
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
    }

    $fileNames = [];
    if (isset($_FILES['lampiran']['tmp_name']) && !empty($_FILES['lampiran']['tmp_name'][0])) {
        foreach ($_FILES['lampiran']['tmp_name'] as $key => $tmp_name) {
            $fileName = str_replace(' ', '_', basename($_FILES['lampiran']['name'][$key]));
            $targetFilePath = $targetDir . $fileName;

            // Validasi tipe file
            $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($_FILES['lampiran']['type'][$key], $allowedTypes)) {
                echo json_encode(['status' => 'error', 'message' => 'Hanya file JPG, PNG, atau PDF yang diperbolehkan']);
                exit;
            }

            // Pindahkan file ke folder tujuan
            if (move_uploaded_file($tmp_name, $targetFilePath)) {
                $fileNames[] = $fileName;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah file ' . $_FILES['lampiran']['name'][$key]]);
                exit;
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Harap unggah minimal satu file lampiran']);
        exit;
    }

    // Menggabungkan nama file menjadi string
    $fileNamesString = implode(',', $fileNames);

    // Gunakan prepared statement untuk keamanan SQL
    $stmt = $conn->prepare("INSERT INTO news (judul, artikel, image_list, penulis, tanggal) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param('ssss', $judul, $message, $fileNamesString, $penulis);

    // Cek apakah query berhasil
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Berita berhasil disimpan']);
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