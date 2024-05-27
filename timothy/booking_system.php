<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preserve";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST["username"];
//     $name = $_POST["name"];
//     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//     $email = $_POST["email"];
//     $user_status = $_POST["user_status"];

//     $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
//     $checkResult = $conn->query($checkQuery);

//     if ($checkResult->num_rows > 0) {
//         echo "Username or email already exists";
//     } else {
//         $sql = "INSERT INTO users (username, name, password, email, user_status) VALUES ('$username', '$name', '$password', '$email', '$user_status')";

//         if ($conn->query($sql) === TRUE) {
//             echo "Registration successful";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     }
// }

// $conn->close();
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_SESSION['username'];
    $keberangkatan = $_POST["keberangkatan"];
    $tujuan = $_POST["tujuan"];
    $email = $_POST["email_booking"];
    $kelas_transportasi = $_POST["kelas_transportasi"];
    $quantity = $_POST["quantity"];
    
    // $user_status = $_POST["user_status"];

    $checkQuery = "SELECT * FROM tiket WHERE nama = '$nama' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);
    // if ($checkResult->num_rows > 0) {
    //     echo "Username or email already exists";
    // } else {
        $sql = "INSERT INTO tiket (nama, keberangkatan, tujuan, email,kelas_transportasi,quantity) VALUES ('$nama', '$keberangkatan', '$tujuan','$email', '$kelas_transportasi','$quantity')";

        if ($conn->query($sql) === TRUE) {

           header('location:user_page.php?berhasil terbooking!');

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    // }
    
}



?>


