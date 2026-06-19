<?php

include "session.php";

if($_SESSION['role'] != "admin"){

    die("Akses Ditolak!");

}
?>