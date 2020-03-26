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
$sql = "SELECT invoice.BillingCountry, SUM(invoice.Total)FROM invoice GROUP BY invoice.BillingCountry HAVING SUM(invoice.Total) >= 100 ORDER BY SUM(invoice.Total) DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       print_r($row);
       echo '<br>';
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>