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
    // Pastikan semua data POST diterima dengan benar
    $id = intval($_POST['idEdit']);
    $nama = htmlspecialchars($_POST['nama']);
    $nik = htmlspecialchars($_POST['nik']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jenis_pendaftaran = htmlspecialchars($_POST['jenis_pendaftaran']);
    $telepon = htmlspecialchars($_POST['telepon']);

    // Debug: tampilkan data yang diterima (untuk pengujian, hapus di produksi)
    var_dump($_POST);

    // Query SQL dengan nama kolom yang benar dan tanpa koma berlebih
    $query = "UPDATE daftar_warga 
              SET nama = ?, 
                  nik = ?, 
                  jk_kelamin = ?, 
                  tanggal_lahir = ?, 
                  tempat_lahir = ?, 
                  alamat = ?, 
                  telepon = ?, 
                  jenis_pendaftaran = ? 
              WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Periksa apakah prepare berhasil
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Binding parameter
    $stmt->bind_param("ssssssssi", $nama, $nik, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $alamat, $telepon, $jenis_pendaftaran, $id);

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

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>