<?php

mysqli_connect("localhost","root", "","preserve");

function registrasi($data) {
    global $conn;

    $name = stripslashes($conn, $data["name"]);
    $username = strtolower(stripslashes($conn, $data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $role = stripslashes($conn, $data["role"]); 

}

//enkripsi password

  $password = password_hash($password , PASSWORD_DEFAULT);

//menghindari username dobel

$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

if( mysqli_fetch_assoc($result) ) {
    echo "<script>
            alert('username sudah ada')
            </script>";
            return false;
}

//koneksi ke database

mysqli_query($conn, "INSERT INTO user VALUES('', '$name', '$username', '$password', '$role')");
return mysqli_affected_rows($conn);

?>