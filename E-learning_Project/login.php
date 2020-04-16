<?php 
session_start();
if(isset($_POST['uUsername'])&&isset($_POST['uPassword'])){
    include_once('DB_Connect/connection.php');
    $username = $_POST['uUsername'];
    $password = $_POST['uPassword'];
    $sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $_SESSION['loginStatus'] = true;
    $_SESSION['firstName'] = $row['firstname'];
    $_SESSION['lastName'] = $row['lastname'];
    $_SESSION['userID'] = $row['id'];
    header('Location: index.php');
    exit();
    }
} 
    $conn->close();
}
include_once('components/compTop.php');
?>
<main>
    <h1>Login here!</h1>
<div id="loginMainContent">
    <form action="login.php" method="post">
        <label><p>Username:</p>
            <input type="text" placeholder="Username Here!" name="uUsername">
        </label>
        <label><p>Password:</p>
            <input type="password" name="uPassword">
        </label>
        <input type="submit" value="Login">
    </form>
    </div>
</main>
<?php
include_once('components/compBottom.php');
?>
