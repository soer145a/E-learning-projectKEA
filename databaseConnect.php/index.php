<?php
if(isset($_POST['uFirstName'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    $uFirstName = $_POST['uFirstName'];
    $uLastName = $_POST['uLastName'];
    $uEmail = $_POST['uEmail'];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO customers (firstname, lastname, email)
    VALUES ( '$uFirstName', '$uLastName', '$uEmail')";
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}else{
    echo 'No entry yet';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="uFirstName">
        <input type="text" name="uLastName">
        <input type="email" name="uEmail">
        <input type="submit" value="Submit to myDB">
    </form>
</body>
</html>