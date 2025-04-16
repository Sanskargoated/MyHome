<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];

    if ($pass !== $c_pass) {
        die("Passwords do not match!");
    }

    // Secure the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Email already registered!");
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_pass);

    if ($stmt->execute()) {
        header("Location: login.html");
        exit;
    } else {
        echo "Something went wrong!";
    }

    $stmt->close();
    $check->close();
    $conn->close();
}
?>
