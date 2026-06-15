<?php

include '../../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM kapal WHERE id_kapal='$id'");

header("Location: ../index.php");