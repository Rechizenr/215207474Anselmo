<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New student added successfully!";
        } else {
            echo "Failed to add a new student.";
        }
    } else {
        echo "Please fill in all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
</head>
<body>
    <h2>Add a New Student</h2>
    <form method="post" action="add.php">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="text" name="email"><br><br>
        <input type="submit" value="Add Student">
    </form>
    <a href="index.php">Back to Student List</a>
</body>
</html>
