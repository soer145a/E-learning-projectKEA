<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chinook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(*) FROM playlist INNER JOIN playlisttrack ON playlist.PlaylistId = playlisttrack.PlaylistId WHERE playlist.Name = 'Grunge'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['COUNT(*)'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>