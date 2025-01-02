<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Insert task into the database
    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New task created successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create New Task</h1>
    <form action="create.php" method="POST">
        Title: <input type="text" name="title" required><br><br>
        Description: <textarea name="description" required></textarea><br><br>
        Status:
        <select name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select><br><br>
        <input type="submit" value="Create Task">
    </form>
</body>
</html>

<?php
$conn->close();
?>
