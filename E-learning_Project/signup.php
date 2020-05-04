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

<!-- 04/05/20 - 12.50 - Daniel har lavet små ændringer til formen.  -->

<div id="signUpArea">
<form action="signup.php" method="post" id="frmSignUp">
<h1>Sign up here</h1>
<label for=""> <p>Username</p>
    <input type="text" name="uUsername" placeholder="Type in a username">
</label>
<label for=""><p>Password</p>
    <input type="password" name="uPassword" placeholder="Type in a password">
</label>
<label><p>First name</p>
    <input type="text" name="uFirstName" placeholder="Type in your first name">
</label>
<label><p>Last name</p>
    <input type="text" name="uLastName" placeholder="Type in your last name">
</label>
<label><p>Email address</p>
    <input type="email" name="uEmail" placeholder="Type in your E-mail">
</label>
<button type="submit">SIGN UP</button>
</form>
</div>


</main>
<?php
include_once('components/compBottom.php');
?>
