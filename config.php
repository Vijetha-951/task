<?php
$servername = "localhost";  // Host name
$username = "root";         // Database username
$password = "password";             // Database password
$dbname = "task_management"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
