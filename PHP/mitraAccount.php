<?php 
include '../Components/conection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari POST dan sanitasi
    $id = mysqli_real_escape_string($conn, $_POST['id']) ?: '';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Validasi input
    if (empty($id) || empty($username) || empty($password)) {
        echo "error: Harap isi semua field";
        exit;
    }

    // Hash password untuk keamanan
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Gunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO user (username, password_acount, id_account) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password_hashed, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }
    $stmt->close();

    // Tutup koneksi
    $conn->close();
}
?>