<?php
header('Content-Type: application/json');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // Supress warning dan notice

// Koneksi ke database
include('../Components/conection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pengaduan = $_POST['id_pengaduan'] ?? '';
    $penanggungJawab = $_POST['penanggungJawab'] ?? '';
    $status = $_POST['status'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validasi awal
    if (empty($id_pengaduan) || empty($penanggungJawab) || empty($status) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Semua field wajib diisi.']);
        exit;
    }

    // Ambil data dari tabel pengaduan
    $sql = "SELECT nama, kategori, image_list, pengaduan, tanggal_pengaduan FROM pengaduan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_pengaduan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $kategori = $row['kategori'];
        $image_list = $row['image_list'];
        $text_pengaduan = $row['pengaduan'];
        $tanggal_pengaduan = $row['tanggal_pengaduan'];
    } else {
        echo json_encode(['success' => false, 'message' => 'Data pengaduan tidak ditemukan.']);
        exit;
    }

    $stmt->close();

    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
    }

    // Simpan file lampiran
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

    // Query untuk menambahkan data ke tabel ulasan
    $sqlInsert = "INSERT INTO fb_pengaduan 
    (nama_pengadu, ulasan_pengadu, tanggal_pengadu, kategori_pengadu, image_pengadu, nama_pjawab, ulasan_pjawab, status_pengaduan, image_pjawab, tanggal_fb, id_pengaduan) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
$stmtInsert = $conn->prepare($sqlInsert);

if ($stmtInsert === false) {
    echo json_encode(['success' => false, 'message' => 'Prepare statement gagal: ' . $conn->error]);
    exit;
}

$stmtInsert->bind_param(
    'sssssssssi',
    $nama,
    $text_pengaduan,
    $tanggal_pengaduan,
    $kategori,
    $image_list,
    $penanggungJawab,
    $message,
    $status,
    $fileNamesString,
    $id_pengaduan
);

if ($stmtInsert->execute()) {
    echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan ke tabel ulasan.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menambahkan data ke tabel ulasan.', 'error' => $stmtInsert->error]);
}

$stmtInsert->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Metode request tidak valid.']);
}

$conn->close(); 
?>