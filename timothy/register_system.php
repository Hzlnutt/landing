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


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $user_status = $_POST["user_status"];

    $checkQuery = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Username or email already exists";
    } else {
        $sql = "INSERT INTO user (username, name, password, email, user_status) VALUES ('$username', '$name', '$password', '$email', '$user_status')";

        if ($conn->query($sql) === TRUE) {
            if ($user_status === "admin") {
                echo '<script>
                alert("Silahkah Login!");
                </script>';    
                header("Location: login.php");
            } elseif ($user_status === "user") {
                echo '<script>
                alert("Silahkah Login!");
                </script>';    
                header("Location: login.php");
            } else {
                echo "Invalid user status";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>


