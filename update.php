<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Update task details
    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Task updated successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Fetch task details to populate form
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);

    // Check if a task was found
    if ($result->num_rows > 0) {
        // Fetch the task data
        $task = $result->fetch_assoc();
    } else {
        echo "Task not found. <a href='index.php'>Go back</a>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        Title: <input type="text" name="title" value="<?php echo isset($task['title']) ? $task['title'] : ''; ?>" required><br><br>
        Description: <textarea name="description" required><?php echo isset($task['description']) ? $task['description'] : ''; ?></textarea><br><br>
        Status:
        <select name="status" required>
            <option value="Pending" <?php if (isset($task['status']) && $task['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="In Progress" <?php if (isset($task['status']) && $task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if (isset($task['status']) && $task['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select><br><br>
        <input type="submit" value="Update Task">
    </form>
</body>
</html>

<?php
$conn->close();
?>
