<?php  
header('Content-Type: application/json');
include('../Components/conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nik = trim($_POST['nik'] ?? '');
    $tempat_lahir = trim($_POST['tempat_lahir'] ?? '');
    $birthDay = trim($_POST['tanggal_lahir'] ?? '');
    $jkKelamin = trim($_POST['jenis_kelamin'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $telphone = trim($_POST['nomor_telepon'] ?? '');
    $agama = trim($_POST['agama'] ?? '');
    $status = trim($_POST['status_perkawinan'] ?? '');
    $pekerjaan = trim($_POST['pekerjaan'] ?? '');
    $kewargaNegaraan = trim($_POST['kewarganegaraan'] ?? '');
    $no_kk = trim($_POST['no_kk'] ?? '');

    // Memastikan form terisi semua
    if (empty($nama) || empty($nik) || empty($tempat_lahir) || empty($birthDay) ||
        empty($jkKelamin) || empty($alamat) || empty($telphone) || 
        empty($agama) || empty($status) || empty($pekerjaan) || 
        empty($kewargaNegaraan) || empty($no_kk)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap isi semua field dengan lengkap']);
        exit;
    }

    // Validasi usia
    $today = new DateTime();
    $birthDate = new DateTime($birthDay);
    $age = $today->diff($birthDate)->y; // Hitung umur dalam tahun

    if ($age < 17) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal daftar: Umur Anda kurang dari 17 tahun']);
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
    $stmt = $conn->prepare("INSERT INTO ktp_warga 
        (nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, telepon, agama, status_perkawinan, pekerjaan, kewarganegaraan, foto_diri, no_kk, tanggal_daftar) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    $stmt->bind_param(
        'sssssssssssss', 
        $nik, 
        $nama, 
        $tempat_lahir, 
        $birthDay, 
        $jkKelamin, 
        $alamat, 
        $telphone, 
        $agama, 
        $status, 
        $pekerjaan, 
        $kewargaNegaraan, 
        $fileNamesString, 
        $no_kk
    );

    // Cek apakah query berhasil
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Pengaduan berhasil dikirim']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $stmt->error]);
        exit;
    }

    // Tutup statement dan koneksi
    if (isset($stmt)) {
        $stmt->close();
    }

    if (isset($conn)) {
        $conn->close();
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
    exit;
}