<?php
include 'config.php';

$id = $_GET['id'];

// Delete task from database
$sql = "DELETE FROM tasks WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Task deleted successfully. <a href='index.php'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
