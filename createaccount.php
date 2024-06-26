<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$username = isset($_POST["username"]) ? $_POST["username"] : null;
$tanggal_lahir = isset($_POST["tanggal_lahir"]) ? $_POST["tanggal_lahir"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;

if ($username && $tanggal_lahir && $password) {
    $query = "INSERT INTO users (username, tanggal_lahir, password, tgl_pembuatan) VALUES ('$username', '$tanggal_lahir', '$password', NOW())";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo json_encode([
            'pesan' => 'Sukses'
        ]);
    } else {
        echo json_encode([
            'pesan' => 'Gagal'
        ]);
    }
} else {
    echo json_encode([
        'pesan' => 'Invalid input'
    ]);
}

$conn->close();
?>
