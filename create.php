<?php 
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crudflutter');
$nama = $_POST["nama"];
$isi = $_POST["isi"];
$data= mysqli_query($conn, "insert into catatan set nama='$nama', isi='$isi', tgl_pembuatan= NOW() ") ;
if ($data) {
    echo json_encode([
        'pesan' => 'Sukses'
    ]);
} else {
    echo json_encode(
        [
            'pesan' => 'Gagal'
        ]
        );
}
?>