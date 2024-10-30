<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE ID = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($email)) {
        $sql = "UPDATE students SET name='$name', email='$email' WHERE ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Student updated successfully!";
        } else {
            echo "Failed to update student.";
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
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $student['ID']; ?>">
        Name: <input type="text" name="name" value="<?php echo $student['name']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $student['email']; ?>"><br><br>
        <input type="submit" value="Update Student">
    </form>
    <a href="index.php">Back to Student List</a>
</body>
</html>
