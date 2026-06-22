<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM users
    WHERE id_user='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Petugas</title>
</head>
<body>

<h2>Edit Petugas</h2>

<form action="proses/edit.php" method="POST">

<input
type="hidden"
name="id_user"
value="<?= $data['id_user']; ?>">

Nama:
<br>
<input
type="text"
name="nama"
value="<?= $data['nama']; ?>"
required>

<br><br>

Username:
<br>
<input
type="text"
name="username"
value="<?= $data['username']; ?>"
required>

<br><br>

Role:
<br>

<select name="role">

<option value="admin">Admin</option>
<option value="petugas">Petugas</option>

</select>

<br><br>

<button type="submit">
Update
</button>

</form>

</body>
</html>