<?php
include "../../../config/koneksi.php";

if (
    isset(
        $_POST['id_area'],
        $_POST['id_user'],
        $_POST['nama_area'],
        $_POST['kapasitas'],
        $_POST['keterangan']
    )
) {

    $id_area = $_POST['id_area'];
    $id_user = $_POST['id_user'];
    $nama_area = $_POST['nama_area'];
    $kapasitas = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO area_tunggu
              (id_area, id_user, nama_area, kapasitas, status, keterangan)
              VALUES
              ('$id_area', '$id_user', '$nama_area', '$kapasitas', 'Aktif', '$keterangan')";

    if (mysqli_query($koneksi, $query)) {

        header("Location: ../index.php");
        exit();

    } else {

        echo "Error MySQL : " . mysqli_error($koneksi);

    }

} else {

    echo "Data belum lengkap!";

}