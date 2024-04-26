<?php

// Check if form submitted , insert form data into users table 

if(isset($_POST('submit'))){
    $namas = $_POST['nama'];
    $usernames = $_POST['username'];
    $passwords = $_POST['password'];
    $levels = $_POST['level'];
    //echo[$]judul};
    // include database connection file 
    include_once("koneksi.php");

    // Insert user data into data table 
    $result = mysqli_query($mysqli,
    "INSERT INTO user{Name,Username,Password,Role) VALUES ('$name','$username','$password','$Role')")

        //show message when user added 
        //echo "Data Added Succesfully. <a href='index.php'>View Data Buku</a>;
        header("location: index.php");
}

?>