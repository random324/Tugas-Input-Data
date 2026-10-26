<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ktp_sederhana";

$connection = mysqli_connect($host, $user, $pass, $db);
if (!$connection){
    die("Koneksi gagal :". mysqli_connect_error());
}
?>