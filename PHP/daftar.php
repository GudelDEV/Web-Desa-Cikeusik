<?php 
    header('Content-Type: application/json');
    include('../Components/conection.php');  // Pastikan path koneksi ke database benar

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = trim($_POST['nama'] ?? '');
        $nik = trim($_POST['nik'] ?? '');
        $jkKelamin = trim($_POST['jenis_kelamin'] ?? '');
        $birthDay = trim($_POST['tanggal_lahir'] ?? '');
        $tempat_lahir = trim($_POST['tempat_lahir'] ?? '');
        $alamat = trim($_POST['alamat'] ?? '');
        $telphone = trim($_POST['telepon'] ?? '');
        $jenisDaftar = trim($_POST['jenis_pendaftaran'] ?? '');
        $alasan = trim($_POST['alasan'] ?? '');

        // Memastikan form terisi semua
        if (empty($nama) || empty($nik) || empty($jkKelamin) || empty($birthDay) || empty($tempat_lahir) || empty($alamat) || empty($telphone) || empty($jenisDaftar) || empty($alasan)) {
            echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
            exit;
        }
    
        // Memastikan nomor telepon
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
     $stmt = $conn->prepare("INSERT INTO pendaftaran (nama, nik, jenis_kelamin, tanggal_lahir, tempat_lahir, alamat, telepon, jenis_daftar, alasan, dokumen, tanggal_daftar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
     $stmt->bind_param('ssssssssss', $nama, $nik, $jkKelamin, $birthDay, $tempat_lahir, $alamat, $telphone, $jenisDaftar, $alasan, $fileNamesString);

 
     // Cek apakah query berhasil
     if ($stmt->execute()) {
         // Kirim respons sukses
         echo json_encode(['status' => 'success', 'message' => 'Pendafataran berhasil dikirim']);
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