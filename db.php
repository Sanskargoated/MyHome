<?php
$servername = "localhost";
$username = "root";
$password = ""; // default for XAMPP
$database = "users"; // replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
