<?php
include_once('../DB_Connect/connection.php');

$sTopicContent = $_POST['topicContent'];
$sTopicName = $_POST['topicName'];

echo $sTopicName; 
echo $sTopicContent; 

// $jTopicContent = json_decode($topicContent);

// $sTopicContent = json_encode($jTopicContent);

// echo $sTopicContent;
$sql = "INSERT INTO courses (courseName,courseContent)
VALUES ('$sTopicName', '$sTopicContent')";
$result = $conn->query($sql);

header('Location: edit_course.php');