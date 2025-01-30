<?php

$host = 'localhost';  
$dbname = 'userdb';   
$dbuser = 'root';     
$dbpass = '';         

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$username = htmlspecialchars($username);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Store the password as plain-text (not recommended)
$password = $conn->real_escape_string($password);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

if ($stmt) {
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error in preparing statement: " . $conn->error;
}

$conn->close();
?>
