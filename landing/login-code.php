<?php

// isi nama host, username mysql, dan password mysql anda
$databaseHost = "locations";
$databaseName = "perpus";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//$host = mysqli_connect("localhost","root","");
if($mysqli){
    echo "koneksi db berhasil.<br/>";
}else{
    echo "koneksi db gagal.<br/>";
}




//mengaktifkan session pada php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($mysql,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['level']=="admin"){
        //buat session login dan username 
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        //alihkan ke halaman dashboard admin
        header("location:admin/index.php");

    //cek jika user login sebagai user
    }elseif($data['level']=="user"){
        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        //alihkan ke halaman dashboard user
        header("location:user/index.php")

    }else{

        //alihkan ke halaman login kembali
        header("location:index.php");
    }
}else{
    header("location:index.php?pesan=gagal");
}






?>