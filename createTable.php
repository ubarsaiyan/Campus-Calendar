<?php
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = "b9d93a5d79adad";
$password = "a2a3fd17";
$dbname = "campuscalendardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE calendarEvents (
sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id VARCHAR(30),
eventDate DATE,
eventTitle VARCHAR(20) NOT NULL,
eventDescription VARCHAR(100),
eventTimeFrom TIME,
eventTimeTo TIME
)";

if ($conn->query($sql) === TRUE) {
    echo "Table calendarEvents created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
