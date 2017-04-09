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
//$id = "1234556";
$googleID = $conn->real_escape_string($googleID);
$eventTitle = $conn->real_escape_string($eventTitle);
$eventDescription = $conn->real_escape_string($eventDescription);
$eventDate = $conn->real_escape_string($eventDate);
$eventTimeFrom = $conn->real_escape_string($eventTimeFrom);
$eventTimeTo = $conn->real_escape_string($eventTimeTo);

$sql = "INSERT INTO calendarEvents (id, eventTitle, eventDescription, eventDate, eventTimeFrom, eventTimeTo) VALUES ('$googleID', '$eventTitle', '$eventDescription', '$eventDate', '$eventTimeFrom', '$eventTimeTo')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
