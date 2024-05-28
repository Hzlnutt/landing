<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userid = "SELECT * FROM user WHERE username = $username";

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $login = mysqli_query($conn,$userid);
    $data = mysqli_fetch_assoc($login);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            if ($row["user_status"] === "admin") {
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: admin_page.php");
                exit;
            } elseif ($row["user_status"] === "user") {
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;    
                header("Location: user_page.php");
                exit;
            } else {
                echo "Status pengguna tidak valid";
            }
        } else {
            echo '<script>
            alert("Password Salah!");
        </script>';
        }
    } else {
        echo '<script>
            alert("Pengguna tidak ada!");
        </script>';
        header("Location: ../landing/Preserve_Web.php?pengguna tidak ada");
    }
}

$conn->close();
?>
