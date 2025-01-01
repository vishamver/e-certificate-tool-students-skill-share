<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = " "; // Your MySQL password
$database = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.html';</script>";
    }
}

// Handle Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "<script>alert('Login successful! Welcome, " . $user['name'] . "'); window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!'); window.location.href='index.html';</script>";
    }
}

$conn->close();
?>