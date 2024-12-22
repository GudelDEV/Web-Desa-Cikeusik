<?php  
header('Content-Type: application/json');

include('../Components/conection.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nik = mysqli_real_escape_string($conn, $_POST['nik']);
    $jk_kelamin = mysqli_real_escape_string($conn, $_POST['jk_kelamin']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $jenis_pendaftaran = mysqli_real_escape_string($conn, $_POST['jenis_pendaftaran']);

    $sql = "INSERT INTO `daftar_warga` (`nama`, `nik`, `jk_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `jenis_pendaftaran`, `tanggal`) 
            VALUES ('$nama', '$nik', '$jk_kelamin', '$tanggal_lahir', '$tempat_lahir', '$alamat', '$telepon', '$jenis_pendaftaran', NOW())";
    
    $query = mysqli_query($conn, $sql);
    if($query){
        echo json_encode(array("status" => "success", "message" => "Data Berhasil Ditambahkan"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Data Gagal Ditambahkan. Kesalahan: " . mysqli_error($conn)));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Metode HTTP tidak valid."));
}
?>