<?php 
include '../Components/conection.php';

// Get the item ID from the request
$itemId = $_POST['id'];

// Prepare the DELETE query with placeholder for itemId
$query = "DELETE FROM news WHERE id = ?";
$stmt = $conn->prepare($query);

// Bind the parameter to the prepared statement
$stmt->bind_param('i', $itemId);

// Execute the query
$stmt->execute();

// Send a response to the AJAX request
if ($stmt->affected_rows > 0) {
    // Item successfully deleted
    echo json_encode(['success' => true]);
} else {
    // Error deleting item
    echo json_encode(['success' => false, 'error' => 'Failed to delete item']);
}

$stmt->close();
$conn->close();
?>