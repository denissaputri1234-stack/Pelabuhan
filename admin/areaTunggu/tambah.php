<?php
include "../../config/koneksi.php";

$user = mysqli_query($koneksi, "SELECT * FROM users");
?>

<form action="proses/tambah.php" method="POST">

    <select name="id_user">
        ...
    </select>

    <input type="text" name="nama_area">

    <input type="number" name="kapasitas">

    <textarea name="keterangan"></textarea>

    <button type="submit">Simpan</button>

</form>