
<?php
include 'koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET["action"] == "update") {
        $id = $_GET['id'];
        $edit_username = $_POST["edit_username"];
        $edit_name = $_POST["edit_name"];
        $edit_email = $_POST["edit_email"];
        $edit_user_status = $_POST["edit_user_status"];

        $sql_update = "UPDATE user 
                       SET username = '$edit_username', name = '$edit_name', email = '$edit_email', user_status = '$edit_user_status'
                       WHERE id = $id";

        if ($conn->query($sql_update) === TRUE) {
            header("Location: admin_panel.php");
            exit(); 
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["action"] == "delete") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql_delete = "DELETE FROM user WHERE id = $id";

            if ($conn->query($sql_delete) === TRUE) {
                header("Location: admin_panel.php");
                exit();
            } else {
                echo "Error deleting user: " . $conn->error;
            }
        }
    }
}
?>
