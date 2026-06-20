<?php
include "../../../config/koneksi.php";

if (
    isset(
        $_POST['id_area'],
        $_POST['id_user'],
        $_POST['nama_area'],
        $_POST['kapasitas'],
        $_POST['status'],
        $_POST['keterangan']
    )
) {

    $id_area    = $_POST['id_area'];
    $id_user    = $_POST['id_user'];
    $nama_area  = $_POST['nama_area'];
    $kapasitas  = $_POST['kapasitas'];
    $status     = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE area_tunggu
              SET
                id_user = '$id_user',
                nama_area = '$nama_area',
                kapasitas = '$kapasitas',
                status = '$status',
                keterangan = '$keterangan'
              WHERE id_area = '$id_area'";

    if (mysqli_query($koneksi, $query)) {

        header("Location: ../index.php");
        exit();

    } else {

        echo "Error MySQL : " . mysqli_error($koneksi);

    }

} else {

    echo "Data belum lengkap!";

}
?>