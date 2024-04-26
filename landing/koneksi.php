<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "preserve";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Koneksi gagal;");
}

?>