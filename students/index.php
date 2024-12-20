<?php
include 'db.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Student List</h2>
    <a href="add.php">Add New Student</a><br><br>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                        </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
