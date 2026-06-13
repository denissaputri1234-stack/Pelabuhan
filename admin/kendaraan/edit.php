<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM kendaraan
WHERE id_kendaraan='$id'");

$row = mysqli_fetch_assoc($data);

?>

<form action="../proses_kendaraan/edit.php" method="POST">

<input type="hidden"
       name="id_kendaraan"
       value="<?= $row['id_kendaraan']; ?>">

No Polisi <br>
<input type="text"
       name="no_polisi"
       value="<?= $row['no_polisi']; ?>"><br><br>

Jenis Kendaraan <br>
<input type="text"
       name="jenis_kendaraan"
       value="<?= $row['jenis_kendaraan']; ?>"><br><br>

Nama Pengemudi <br>
<input type="text"
       name="nama_pengemudi"
       value="<?= $row['nama_pengemudi']; ?>"><br><br>

Nomor Antrian <br>
<input type="text"
       name="nomor_antrian"
       value="<?= $row['nomor_antrian']; ?>"><br><br>

Status <br>
<select name="status">
    <option value="Menunggu">Menunggu</option>
    <option value="Ditempatkan">Ditempatkan</option>
    <option value="Naik Kapal">Naik Kapal</option>
</select>

<br><br>

<button type="submit">Update</button>

</form>