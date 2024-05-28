<!-- admin_edit.php -->

<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql_fetch = "SELECT * FROM user WHERE id = $id";
        $result_fetch = $conn->query($sql_fetch);

        if ($result_fetch->num_rows > 0) {
            $row = $result_fetch->fetch_assoc();
            ?>
            <h2>Edit User</h2>
            <form action="admin_crud.php?action=update&id=<?php echo $row['id']; ?>" method="post">
                <label for="edit_username">Username:</label>
                <input type="text" name="edit_username" value="<?php echo $row['username']; ?>" required><br>
                <label for="edit_name">Name:</label>
                <input type="text" name="edit_name" value="<?php echo $row['name']; ?>" required><br>
                <label for="edit_email">Email:</label>
                <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" required><br>
                <label for="edit_user_status">User Status:</label>
                <select name="edit_user_status">
                    <option value="user" <?php echo ($row['user_status'] == 'user') ? 'selected' : ''; ?>>User</option>
                    <option value="admin" <?php echo ($row['user_status'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                </select><br>
                <input type="submit" value="Update User">
            </form>
            <?php
        } else {
            echo "User not found";
        }
    } else {
        echo "Invalid request";
    }
}
?>
