<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

// Delete data from database
$sql = "DELETE FROM catatan WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        'message' => 'Item deleted successfully'
    ]);
} else {
    echo json_encode([
        'message' => 'Failed to delete item: ' . $conn->error
    ]);
}

$conn->close();
?>
