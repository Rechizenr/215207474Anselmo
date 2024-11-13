<?php
include 'db.php';

$student = null; // Initialize student variable

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE ID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc(); 
    } else {
        echo "Student not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($email)) {
        $sql = "UPDATE students SET name='$name', email='$email' WHERE ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Student updated successfully!";
        } else {
            echo "Failed to update student.";
        }
    } else {
        echo "Please fill in all fields.";
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

    <?php if ($student): ?> 
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo $student['name']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $student['email']; ?>"><br><br>
        <input type="submit" value="Update Student">
    </form>
    <?php else: ?>
        <p>Student data has been edited.</p>
    <?php endif; ?>

    <a href="index.php">Back to Student List</a>
</body>
</html>
