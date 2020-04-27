<?php
// REAL LOGIN INFO
<<<<<<< HEAD
=======
<<<<<<< HEAD
//$servername = 'soren-remboll.com.mysql';
//$username = 'soren_remboll_com';
//$password = 'KEA_webdev2020WaterBottle';
//$dbname = 'soren_remboll_com';
=======
>>>>>>> 191bf38dd1636ee4b04bb2766ee70934d8837574
// $servername = 'soren-remboll.com.mysql';
// $username = 'soren_remboll_com';
// $password = 'KEA_webdev2020WaterBottle';
// $dbname = 'soren_remboll_com';
<<<<<<< HEAD
=======
>>>>>>> c3c9a03d6b0f929cc0e83b63b913390618b353c4
>>>>>>> 191bf38dd1636ee4b04bb2766ee70934d8837574
//

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'soren_remboll_com';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
