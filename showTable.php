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

$sql = "SELECT sno,id,eventDate,eventTitle,eventDescription,eventTimeFrom,eventTimeTo FROM calendarEvents WHERE id='$googleID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "sno: ".$row["sno"]." -- id: " . $row["id"]. " - Title: " . $row["eventTitle"]. " -- " . $row["eventDescription"]." -- ".$row["eventDate"]." -- ".$row["eventTimeFrom"]." -- ".$row["eventTimeTo"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>