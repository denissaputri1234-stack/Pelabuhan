<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

if(isset($_POST['simpan'])){

    mysqli_query(
        $koneksi,
        "UPDATE kendaraan
        SET status='Naik Kapal'
        WHERE id_kendaraan='$id'"
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Konfirmasi Kendaraan</title>

<link rel="stylesheet"
href="../../assets/css/form.css">

</head>
<body>

<div class="form-box">

<h2>Konfirmasi Kendaraan</h2>

<p>

Apakah kendaraan ini sudah naik kapal?

</p>

<br>

<form method="POST">

<button
type="submit"
name="simpan">

Ya, Sudah Naik Kapal

</button>

<a
href="index.php"
class="btn-kembali">

Batal

</a>

</form>

</div>

</body>
</html>