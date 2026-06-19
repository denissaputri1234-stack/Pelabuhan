<?php
include "../../../config/koneksi.php";

if (isset($_POST['id_user'], $_POST['nama_area'], $_POST['kapasitas'], $_POST['keterangan'])) {

    $id_user = $_POST['id_user'];
    $nama_area = $_POST['nama_area'];
    $kapasitas = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO area_tunggu (id_user, nama_area, kapasitas, keterangan)
              VALUES ('$id_user', '$nama_area', '$kapasitas', '$keterangan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Data area tunggu gagal ditambahkan!";
    }

} else {
    echo "Data belum lengkap!";
}