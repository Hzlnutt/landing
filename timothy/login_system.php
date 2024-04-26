<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            if ($row["user_status"] === "admin") {
                header("Location: admin_page.php");
                exit;
            } elseif ($row["user_status"] === "user") {
                header("Location: user_page.php");
                exit;
            } else {
                echo "Status pengguna tidak valid";
            }
        } else {
            echo "Password tidak valid";
        }
    } else {
        echo "Pengguna tidak ditemukan";
    }
}

$conn->close();
?>
