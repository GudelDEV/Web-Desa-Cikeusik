<?php
// Koneksi ke database
include '../Components/conection.php'; // Pastikan untuk mengubah ini sesuai dengan file koneksi kamu

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM news WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
}
?>