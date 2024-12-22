<?php
// Koneksi ke database
include '../Components/conection.php'; // Pastikan untuk mengubah ini sesuai dengan file koneksi kamu

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM saran_warga WHERE id_saran = ?";
    $stmt = $conn->prepare($query);
    
    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
        exit;
    }
    
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        echo json_encode(['error' => 'Execution failed: ' . $stmt->error]);
        exit;
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        // Cek dan ambil gambar jika ada
        $data['image_lampiran'] = isset($data['image_lampiran']) && $data['image_lampiran'] ? '../uploads/' . $data['image_lampiran'] : '';
        
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'No data found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>