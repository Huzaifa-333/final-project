<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Add New User</h2>
    <form action="save_data.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        <label for="address">Message:</label>
        <input type="text" id="message" name="message"><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Users List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php
        include 'db_config.php';
        
        $sql = "SELECT * FROM gym";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["address"]."</td>";
                echo "<td>".$row["message"]."</td>";
                echo "<td><a href='edit_data.php?id=".$row["id"]."'>Edit</a> | <a href='delete_data.php?id=".$row["id"]."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        
        $conn->close();
        ?>
    </table>
</body>
</html>