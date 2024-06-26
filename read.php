<?php

header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');
$query=mysqli_query($conn, "select * from catatan");
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);
echo json_encode($data);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array("success" => false, "message" => "Connection failed: " . $conn->connect_error)));
}
