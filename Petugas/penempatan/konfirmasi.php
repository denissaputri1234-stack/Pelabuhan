<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "UPDATE penempatan SET status='Terkonfirmasi' WHERE id='$id'");
echo "Penempatan berhasil dikonfirmasi.";
echo "<br><a href='index.php'>Kembali</a>";
?>
