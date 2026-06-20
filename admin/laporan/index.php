<?php

include "../../config/koneksi.php";

$data = mysqli_query(
    $koneksi,
    "
    SELECT *
    FROM laporan
    ORDER BY tanggal DESC
    "
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>

    <link rel="stylesheet"
          href="../../assets/css/table.css">
</head>
<body>

<h2>Data Laporan</h2>

<p>
    <a href="../dashboard.php">
        ← Dashboard Admin
    </a>
</p>

<table>

<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $row['judul']; ?></td>

    <td><?= $row['tanggal']; ?></td>

    <td>

        <a href="detail.php?id=<?= $row['id_laporan']; ?>">
            Detail
        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>