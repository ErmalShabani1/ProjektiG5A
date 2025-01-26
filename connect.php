<?php
$host="localhost";
$username="root";
$pass="";
$db="userdb";
$conn= new mysqli($host, $username, $pass, $db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}

session_start();
?>