<?php
include_once('components/compTop.php');
include_once('DB_Connect/connection.php');
$uFirstName = $_SESSION['firstName'];
$uLastName = $_SESSION['lastName'];
$sql = "SELECT * FROM customers WHERE firstname = '$uFirstName' AND lastname = '$uLastName'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(isset($_POST['uFirstName'])){
    $sql = 'UPDATE customers SET firstname = "'.$_POST['uFirstName'].'" lastname = "'.$_POST['uLastName'].'"'
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
        exit();
    }
?>
<main>
<div id="profileInfo">
<h1>Profile</h1>
<div id="profileContent">
<p>First Name: <span id="pFirstName"><?= $row['firstname']?></span></p>
<p>Last Name: <span id="pLastName"><?= $row['lastname']?></p></span>
<p>Email: <span id="pEmail"><?= $row['email']?></p></span>
<p>Username: <span id="pUsername"> <?= $row['username']?></p> </span>
<p>password: <span id="pPassword"><?php $iPasswordLenght = strlen($row['password']); for ($i=0; $i < $iPasswordLenght; $i++){echo '*';} ?></p>
<input id="hiddenPassword" type="hidden" value="<?=$row['password']?>">
<button onclick="editProfile()">EDIT</button>
</div>
</div>






</main>
<?php
include_once('components/compBottom.php');
?>