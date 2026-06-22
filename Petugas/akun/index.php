<?php

include "../../config/koneksi.php";

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM users"
);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="assets/css/table.css">
    <link rel="stylesheet"href="assets/css/form.css">
    <title>Data Petugas</title>
</head>
<body>

<h2>Data Petugas</h2>

<a href="tambah.php">Tambah Petugas</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Username</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php while($data = mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $data['id_user']; ?></td>
<td><?= $data['nama']; ?></td>
<td><?= $data['username']; ?></td>
<td><?= $data['role']; ?></td>

<td>
    <a href="edit.php?id=<?= $data['id_user']; ?>">Edit</a>
    |
    <a href="proses/hapus.php?id=<?= $data['id_user']; ?>">Hapus</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>