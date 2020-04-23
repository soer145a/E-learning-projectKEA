<?php
        if(isset($_SESSION['loginStatus'])){
          $sName = $_SESSION['firstName'].' '.$_SESSION['lastName'];
          $htmlOutput = "Hi ".$sName." <br> <a href='logout.php'><p>Logout</p></a> <a href='profile.php'>My Profile</a>";
        }else{
          $htmlOutput = "<a href='login.php'><p>Login</p></a>
          <a href='signup.php'><p>Sign Up</p></a>
           ";
        }
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BUILDING 23-4-2020</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <header>
      <div id="logo">
        <img src="" alt="" />
      </div>
      <nav id="topNav">
        <div class="topNavItem active">Content1</div>
        <div class="topNavItem">Content2</div>
        <div class="topNavItem">Content3</div>
        <div class="topNavItem">Content4</div>
        <div class="topNavItem">
        <div class="navItemContainer">
        <?=$htmlOutput?>
        
          
        </div>
        </div>
      </nav>
    </header>