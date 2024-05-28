<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "admin_panel.css">
    <title>Admin Page</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="login.php"><button>ADD USER</button></a>

    <?php

    include 'koneksi.php';
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "preserve";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>Email</th><th>User Status</th><th>Password</th><th>action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["user_status"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>"."<a href='admin_edit.php?id=" . $row["id"] . "'>Edit</a> | " ."<a href='admin_crud.php?action=delete&id=" . $row["id"] . "' onclick='return confirmDelete();'>Delete</a> ";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found";
    }

    $conn->close();
    ?>
    <br>

        <a href="admin_page.php"><button>RETURN</button></a>
</body>
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user?');
}
</script>
</html>
