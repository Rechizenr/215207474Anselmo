<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Failed to delete student.";
    }
}
header("Location: index.php");
?>
