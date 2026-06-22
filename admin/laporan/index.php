<?php

include "../../config/koneksi.php";

$data = mysqli_query(
    $koneksi,
    "SELECT
    laporan.*,
    users.nama

    FROM laporan

    JOIN users
    ON laporan.id_user = users.id_user

    ORDER BY laporan.tanggal DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Laporan</title>

<link rel="stylesheet"
href="../../assets/css/table.css">

</head>
<body>

<div class="container">

<h2>Data Laporan Petugas</h2>

<table>

<tr>
<th>No</th>
<th>Petugas</th>
<th>Judul Kendala</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>

<?php

$no = 1;

while($row = mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama']; ?></td>

<td><?= $row['judul']; ?></td>

<td><?= $row['tanggal']; ?></td>

<td>

<a
class="detail"
href="detail.php?id=<?= $row['id_laporan']; ?>">

Detail

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>