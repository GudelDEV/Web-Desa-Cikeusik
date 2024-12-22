<?php
header('Content-Type: application/json');
error_reporting(E_ALL); // Tampilkan semua error
ini_set('display_errors', 1); // Pastikan error ditampilkan

include('../Components/conection.php'); // Pastikan path koneksi benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari request POST
    $namaproduk = htmlspecialchars($_POST['nama'] ?? '');
    $judul_produk = htmlspecialchars($_POST['judul'] ?? '');
    $harga = htmlspecialchars($_POST['harga'] ?? '');
    $stock = htmlspecialchars($_POST['stock'] ?? '');
    $namaToko = htmlspecialchars($_POST['namaToko'] ?? '');
    $alamat = htmlspecialchars($_POST['alamat'] ?? '');
    $telephone = htmlspecialchars($_POST['telephone'] ?? '');
    $id_produk = htmlspecialchars($_POST['id_produk'] ?? '');
    $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');

    // Validasi data
    if (
        empty($namaproduk) || empty($judul_produk) || empty($harga) ||
        empty($stock) || empty($namaToko) || empty($alamat) ||
        empty($telephone) || empty($id_produk)
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Penanganan file upload
    $targetDir = "../produk/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Buat folder jika belum ada
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

            // Pindahkan file
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

    // Gabungkan nama file
    $fileNamesString = implode(',', $fileNames);

    // Query menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO produk 
    (nama_produk, judul_produk, harga_produk, nama_toko, alamat, no_telpon, stock, image_produk, deskripsi_produk, id_product)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare statement gagal: ' . $conn->error]);
        exit;
    }
    
    // Pastikan jumlah parameter dan tipe datanya sesuai dengan tabel
    $stmt->bind_param(
        'sssssssssi', // Format: s=string, i=integer, d=double (number)
        $namaproduk,     // String
        $judul_produk,   // String
        $harga,          // String (atau ubah ke 'd' jika harga numerik)
        $namaToko,       // String
        $alamat,         // String
        $telephone,      // String
        $stock,          // String (atau ubah ke 'i' jika numerik)
        $fileNamesString, // String (nama file, dipisahkan koma jika banyak)
        $deskripsi,      // String
        $id_produk       // Integer
    );

    // var_dump($_POST);
    // Eksekusi statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Data produk berhasil ditambahkan']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $stmt->error]);
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
    exit;
}
?>