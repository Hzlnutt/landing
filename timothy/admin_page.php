<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: white;
            color: black;
            border: 2px solid #04AA6D;
            background-color: #FF416C; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="login.php"><button>ADD USER</button></a>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
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
</body>
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user?');
}
</script>
</html>
