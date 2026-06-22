<?php
include "../../../config/koneksi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM area_tunggu
              WHERE id_area = '$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Data area tunggu gagal dihapus!";
    }

} else {
    echo "ID area tidak ditemukan!";
}