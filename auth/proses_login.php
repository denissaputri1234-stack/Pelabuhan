<?php

session_start();

include "../config/koneksi.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM users
     WHERE username='$username'
     AND password='$password'"
);

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    if($data['role'] == 'admin'){

        header("Location: ../admin/dashboard.php");

    }elseif($data['role'] == 'petugas'){

        header("Location: ../Petugas/dashboard.php");

    }

    exit();

}else{

    echo "
    <script>
        alert('Username atau Password Salah!');
        window.location='login.php';
    </script>
    ";

}
?>