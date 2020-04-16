<?php 
session_start();
if(isset($_POST['uUsername'])&&isset($_POST['uPassword'])){
include_once('DB_Connect/connection.php');
$uEmail = $_POST['uEmail'];
$uFirstName = $_POST['uFirstName'];
$uLastName = $_POST['uLastName'];
$uUsername = $_POST['uUsername'];
$uPassword= $_POST['uPassword'];


$_SESSION['loginStatus'] = true;
$_SESSION['firstName'] = $uFirstName;
$_SESSION['lastName'] = $uLastName;



$sql = "INSERT INTO customers (firstname, lastname, email, username, password)
    VALUES ('$uFirstName','$uLastName','$uEmail','$uUsername','$uPassword')";
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $_SESSION['userID'] = $last_id;
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}

?>
<?php
include_once('components/compTop.php');
?>
<main>

<h1>Sign Up here!</h1>
<div id="signUpArea">
<form action="signup.php" method="post">
<label for=""> <p>Username:</p>
    <input type="text" name="uUsername" placeholder="Username">
</label>
<label for=""><p>Password:</p>
    <input type="password" name="uPassword" placeholder="XXXXX">
</label>
<label><p>First Name:</p>
    <input type="text" name="uFirstName" placeholder="John">
</label>
<label><p>Last Name:</p>
    <input type="text" name="uLastName" placeholder="Smith">
</label>
<label><p>Email Address:</p>
    <input type="email" name="uEmail" placeholder="john@smith.com">
</label>
 <br>
<input type="submit" value="Sign Up!">
</form>
</div>


</main>
<?php
include_once('components/compBottom.php');
?>
