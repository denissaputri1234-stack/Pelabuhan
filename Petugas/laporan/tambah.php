<?php

session_start();

include "../../config/koneksi.php";

if(isset($_POST['simpan'])){

    $id_user = $_SESSION['id_user'];
    $judul = $_POST['judul'];
    $isi_laporan = $_POST['isi_laporan'];

    mysqli_query(
        $koneksi,
        "INSERT INTO laporan
        (
            id_user,
            judul,
            isi_laporan
        )

        VALUES
        (
            '$id_user',
            '$judul',
            '$isi_laporan'
        )"
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Laporan</title>

<link rel="stylesheet" href="../../assets/css/form.css">

</head>
<body>

<div class="container">

    <div class="form-box">

        <h2>Tambah Laporan Kendala</h2>

        <form method="POST">

            <label>Judul Kendala</label>

            <input
            type="text"
            name="judul"
            required
            placeholder="Contoh : Salah Penginputan Area">

            <label>Isi Laporan</label>

            <textarea
            name="isi_laporan"
            rows="6"
            required
            placeholder="Jelaskan kendala yang terjadi"></textarea>

            <button
            type="submit"
            name="simpan">

                Simpan

            </button>

            <a
            href="index.php"
            class="btn-kembali">

                Batal

            </a>

        </form>

    </div>

</div>

</body>
</html>