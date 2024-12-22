<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_cikeusik';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); // ID berita yang ingin diupdate
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];
    $isi_berita = $_POST['message'];

    // Debug: tampilkan data yang diterima
    var_dump($_POST);

    // Menangani upload file
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
    }

    $fileNames = [];
    $fileNamesString = ''; // Default jika tidak ada file yang diupload
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

        // Mengubah array file menjadi string untuk disimpan
        $fileNamesString = implode(',', $fileNames);
    }

    // Gunakan prepared statement untuk keamanan SQL
    if ($fileNamesString !== '') {
        // Jika ada file yang diupload, update image_list
        $stmt = $conn->prepare("UPDATE news SET judul = ?, artikel = ?, image_list = ?, penulis = ?, tanggal = NOW() WHERE id = ?");
        $stmt->bind_param('ssssi', $judul, $isi_berita, $fileNamesString, $penulis, $id);
    } else {
        // Jika tidak ada file, update tanpa mengubah image_list
        $stmt = $conn->prepare("UPDATE news SET judul = ?, artikel = ?, penulis = ?, tanggal = NOW() WHERE id = ?");
        $stmt->bind_param('sssi', $judul, $isi_berita, $penulis, $id);
    }
    
    // Debug: Tampilkan query yang akan dijalankan
    var_dump($fileNamesString);

    // Eksekusi query
    if (!$stmt->execute()) {
        echo "Error executing query: " . $stmt->error;
    } else {
        if ($stmt->affected_rows > 0) {
            echo "Data updated successfully.";
        } else {
            echo "No changes made.";
        }
    }

    // Menutup koneksi
    $stmt->close();
    $conn->close();
}
?>