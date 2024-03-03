<?php
// Database connection parameters
$host = 'localhost';      // Replace with your database host
$user = 'root';      // Replace with your database username
$password = '';  // Replace with your database password
$database = 'records';  // Replace with your database name

// Create a database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set the character set (utf8mb4 is recommended for full Unicode support)
mysqli_set_charset($conn, "utf8mb4");
?>
