<?php

include "../../../config/koneksi.php";

$id = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$role = $_POST['role'];

mysqli_query(
    $koneksi,
    "UPDATE users SET

    nama='$nama',
    username='$username',
    role='$role'

    WHERE id_user='$id'"
);

header("Location: ../index.php");