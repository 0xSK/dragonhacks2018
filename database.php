<?php
$servername = "localhost";
$username = "root";
$password = "secret";
$dbname = "dragonhacks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>