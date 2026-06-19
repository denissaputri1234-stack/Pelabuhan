<!DOCTYPE html>
<html>
<head>
    <title>Tambah Petugas</title>
</head>
<body>

<h2>Tambah Petugas</h2>

<form action="proses/tambah.php" method="POST">

Nama:
<br>
<input type="text" name="nama" required>

<br><br>

Username:
<br>
<input type="text" name="username" required>

<br><br>

Password:
<br>
<input type="text" name="password" required>

<br><br>

Role:
<br>

<select name="role">

<option value="admin">Admin</option>
<option value="petugas">Petugas</option>

</select>

<br><br>

<button type="submit">
Simpan
</button>

</form>

</body>
</html>