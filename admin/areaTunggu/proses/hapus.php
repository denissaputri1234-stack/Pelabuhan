<?php
include "../../../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
DELETE FROM area_tunggu
WHERE id_area='$id'
");

header("Location: ../index.php");