<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = isset($_POST["username"]) ? $_POST["username"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;

if ($username && $password) {
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
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
