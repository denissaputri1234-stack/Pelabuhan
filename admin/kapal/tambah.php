<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kapal</title>
</head>
<body>

<center>

<h2>TAMBAH DATA KAPAL</h2>

<p>Silakan isi data kapal yang akan ditambahkan.</p>

<hr width="60%">

<form action="proses/tambah.php" method="POST">

<table cellpadding="8">

    <tr>
        <td><b>Nama Kapal</b></td>
        <td>:</td>
        <td>
            <input
                type="text"
                name="nama_kapal"
                size="35"
                required
            >
        </td>
    </tr>

    <tr>
        <td><b>Kapasitas</b></td>
        <td>:</td>
        <td>
            <input
                type="number"
                name="kapasitas"
                size="35"
                required
            >
        </td>
    </tr>

    <tr>
        <td><b>Status</b></td>
        <td>:</td>
        <td>
            <select name="status" required>
                <option value="">
                    -- Pilih Status --
                </option>
                <option value="Aktif">
                    Aktif
                </option>
                <option value="Tidak Aktif">
                    Tidak Aktif
                </option>
            </select>
        </td>
    </tr>

</table>

<br>

<hr width="60%">

<button type="submit">
    Simpan
</button>

&nbsp;&nbsp;

<a href="index.php">
    Kembali
</a>

</form>

</center>

</body>
</html>