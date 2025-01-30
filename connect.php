<?php
$host = "localhost";
$username = "root";
$pass = "";
$db = "userdb";
$conn = new mysqli($host, $username, $pass, $db);

if ($conn->connect_error) {
    echo "Failed to connect to DB: " . $conn->connect_error;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>