<!DOCTYPE html>
<html>
<head>
    <title>Login Pelabuhan Gilimanuk</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    
</head>

<body>
<div class="login-container">
    <img src="../assets/img/logo.png" class="logo">

    <h2>Login Sistem Pelabuhan Gilimanuk</h2>

    <form action="proses_login.php" method="POST">

        <label>Username</label>
        <br>
        <input type="text" name="username" required>

        <br><br>

        <label>Password</label>
        <br>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">
            Login
        </button>

    </form>
</div>
</body>
</html>