<?php
// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password is empty
$dbname = "users"; // use your DB name here

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submitted?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    // Basic validation
    if ($password !== $cpassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login Now</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
