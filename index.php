<?php
include 'config.php';

// Fetch all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
</head>
<body>
    <h1>Task Management System</h1>
    
    <a href="create.php">Add New Task</a>

    <h2>Task List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No tasks found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
