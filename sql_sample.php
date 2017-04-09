<?php
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = "b9d93a5d79adad";
$password = "a2a3fd17";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
