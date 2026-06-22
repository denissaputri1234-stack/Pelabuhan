<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Sistem Pelabuhan Gilimanuk</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="login-page">

<div class="login-container">

    <img src="../assets/img/logo.png" class="logo">

    <h2>Login Sistem Pelabuhan Gilimanuk</h2>

    <form action="proses_login.php" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">
            Login
        </button>

    </form>

    <br>

    <a href="../index.php">
        ← Kembali ke Halaman Utama
    </a>

</div>

</body>
</html>