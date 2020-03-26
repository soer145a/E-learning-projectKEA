<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUILDING 25-3-2020</title>
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
        <?php
        session_start();
        if(isset($_SESSION['loginStatus'])){
          $sName = $_SESSION['firstName'].' '.$_SESSION['lastName'];
          echo "Hi ".$sName." <br> <a href='logout.php'><p>Logout</p></a> <a href='profile.php'>My Profile</a>";
        }else{
          echo "<a href='login.php'><p>Login</p></a>
          <a href='signup.php'><p>Sign Up</p></a>
           ";
        }
        ?>
        
          
        </div>
        </div>
      </nav>
    </header>