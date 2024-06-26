<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$isi = $_POST['isi'];

// Update data in database
$sql = "UPDATE catatan SET nama='$nama', isi='$isi' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        'message' => 'Data updated successfully'
    ]);
} else {
    echo json_encode([
        'message' => 'Failed to update data: ' . $conn->error
    ]);
}

$conn->close();
?>
