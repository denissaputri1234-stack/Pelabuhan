<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    mysqli_query($conn, "INSERT INTO laporan_petugas(judul, isi) VALUES('$judul','$isi')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Laporan</title></head>
<body>
    <form method="post">
        <input type="text" name="judul" placeholder="Judul"><br>
        <textarea name="isi" placeholder="Isi laporan"></textarea><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
