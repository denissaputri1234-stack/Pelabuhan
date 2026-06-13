<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../config/koneksi.php';

echo "<h3>Data yang diterima:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";