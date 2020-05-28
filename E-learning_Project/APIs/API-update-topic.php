<?php
include_once('../DB_Connect/connection.php');
$sID = $_GET['topicID'];

$sTopicName = $_POST['topicName'];
$sTopicContent = $_POST['topicContent'];

$sql = "UPDATE courses SET courseName='$sTopicName', courseContent='$sTopicContent'WHERE courseID=$sID";

$result = $conn->query($sql);

