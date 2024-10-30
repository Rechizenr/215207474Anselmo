<?php
include 'db.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<body>
    <h2>Student</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . ($row['name']) . "</td>";
                echo "<td>" . ($row['email']) . "</td>";
                echo "<td>Delete</td>";
            }
        } else {
            echo "<tr><td colspan='3'>No Students</td></tr>";
        }
        ?>
    </table>
</body>
</html>
