<?php  
header('Content-Type: application/json');
include('../Components/conection.php');  // Pastikan path koneksi ke database benar

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Ambil Data Form
    $nama = trim($_POST['nama'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $telphone = trim($_POST['telepon'] ?? '');
    $judul = trim($_POST['judul'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $privasi = trim($_POST['privasi'] ?? '');


    // Validate Form 
    // Memastikan form terisi semua
    if (empty($nama) || empty($alamat) || empty($telphone) || empty($judul) || empty($deskripsi) || empty($kategori) || empty($privasi)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Memastikan nomor telepon
    if (!preg_match('/^[0-9]+$/', $telphone)) {
        echo json_encode(['status' => 'error', 'message' => 'Nomor telepon tidak valid']);
        exit;
    }

    // Memastikan Privasi 
    if ($privasi !== 'anonim') {
        $privasi = $nama;
    } else {
        $privasi = 'anonim';
        $nama = $privasi;
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
     $stmt = $conn->prepare("INSERT INTO saran_warga (nama, alamat, telepon, judul, deskripsi, kategori, image_lampiran, privasi, tanggal_saran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
     $stmt->bind_param('ssssssss', $nama, $alamat, $telphone, $judul, $deskripsi, $kategori, $fileNamesString, $privasi);

     
 
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

     ob_start();
// Script PHP Anda
$output = ob_get_clean();
if (!empty($output)) {
    echo json_encode(['status' => 'error', 'message' => 'Unexpected output: ' . $output]);
    exit;
}
        
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
    exit;
}


?>