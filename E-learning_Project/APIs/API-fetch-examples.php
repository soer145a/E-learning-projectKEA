<?php
session_start();
include_once('../DB_Connect/connection.php');
echo $_SESSION['loginStatus'];
if(isset($_SESSION['loginStatus'])){
    $sql = "UPDATE loginreporting SET InLogged = InLogged + 1 WHERE reportingID = 1";
}else{
    $sql = "UPDATE loginreporting SET nonLogged = nonLogged + 1 WHERE reportingID = 1";
}
$conn->query($sql);
$sID = $_GET['courseID'];
$sql = "SELECT topicContent FROM topics WHERE topicID = $sID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   $jData = json_decode($row['topicContent']);
   echo json_encode($jData->example);
    }
}else{
    echo '0 results';
}