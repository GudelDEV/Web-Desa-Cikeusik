<?php
header('Content-Type: application/json');



include('../Components/conection.php');  // Pastikan path koneksi ke database benar

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data form
    $nama = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telphone = trim($_POST['telphone'] ?? '');
    $category = trim($_POST['kategori'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi data
    if (empty($nama) || empty($email) || empty($telphone) || empty($category) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid']);
        exit;
    }

    if (!preg_match('/^[0-9]+$/', $telphone)) {
        echo json_encode(['status' => 'error', 'message' => 'Nomor telepon tidak valid']);
        exit;
    }

    // Penanganan file lampiran
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);  // Membuat folder jika belum ada
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
    $stmt = $conn->prepare("INSERT INTO pengaduan (nama, email, number_telephone, kategori, image_list, pengaduan, tanggal_pengaduan) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param('ssssss', $nama, $email, $telphone, $category, $fileNamesString, $message);

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