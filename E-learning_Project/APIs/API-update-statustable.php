<?php
include_once('../DB_Connect/connection.php');
$sID = $_GET['courseID'];
$sTopic = $_GET['topic'];
$sql = "UPDATE `customerstatus` a 
LEFT JOIN `customercourse` b
ON a.`statusID` = b.`statusID`  
SET a.statusVariabel = 1  
WHERE b.customerID = '37' AND b.courseID = 2";