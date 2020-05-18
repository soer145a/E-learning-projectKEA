<?php
session_start();
$_SESSION['uUsernameError'] = "";
if (isset($_POST['uUsername']) && isset($_POST['uPassword'])) {
    include_once('DB_Connect/connection.php');

    $uFirstName = $_POST['uFirstName'];
    $uLastName = $_POST['uLastName'];
    $uEmail = $_POST['uEmail'];
    $uUsername = $_POST['uUsername'];
    $uPassword = $_POST['uPassword'];

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
    }else{
        if(mysqli_errno($conn) == 1062){
            $uErrorMessage = "ERROR 1062 - Username or password already exist";
        
            $_SESSION['uUsernameError'] = $uErrorMessage;
        } 
    }

    $conn->close();
}

?>
<?php
include_once('components/compTop.php');
?>
<span id="background">
    <img src="assets/Polygon 1.svg" alt="" />
    <img src="assets/Polygon 2.svg" alt="" />
</span>

<main>

    <!-- 04/05/20 - 12.50 - Daniel har lavet små ændringer til formen.  -->
    <div id="signUpArea">
        <form action="signup.php" method="post" id="frmSignUp" onsubmit=" return validate()">
            <h1>Sign up here</h1>
            <label for="">
                <p>Username</p>
                <input type="text" name="uUsername" placeholder="Type in a username" data-validate="string" data-min="2" data-max="30" oninput="validate()">
                <?=$_SESSION['uUsernameError']?>
            </label>
            <label for="">
                <p>Password</p>
                <input type="password" name="uPassword" placeholder="Type in a password" data-validate="string" data-min="2" data-max="30" oninput="validate()">
            </label>
            <label>
                <p>First name</p>
                <input type="text" name="uFirstName" placeholder="Type in your first name" data-validate="string" data-min="2" data-max="30" oninput="validate()">
            </label>
            <label>
                <p>Last name</p>
                <input type="text" name="uLastName" placeholder="Type in your last name" data-validate="string" data-min="2" data-max="30" oninput="validate()">
            </label>
            <label>
                <p>Email address</p>
                <input type="text" name="uEmail" placeholder="Type in your E-mail" data-validate="email" oninput="validate()">
            </label>
            <button type="submit">SIGN UP</button>
        </form>
    </div>


</main>
<?php
include_once('components/compBottom.php');
?>