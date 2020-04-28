<?php
        if(isset($_SESSION['loginStatus'])){
          $sName = $_SESSION['firstName'].' '.$_SESSION['lastName'];
          $htmlOutput = "Hi ".$sName." <br> <a href='logout.php'><p>Logout</p></a> <a href='profile.php'>My Profile</a>";
        }else{
          $htmlOutput = "<button class='btn-primary'>SIGN UP</button>
          <button class='btn-tertiary'>LOG IN</button>
           ";
        }
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Teko:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BUILDING 23-4-2020</title>
    <!-- <link rel="stylesheet" href="main.css" /> -->
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="index.css" />
    <!-- <link rel="stylesheet" href="course.css" /> -->
  </head>
  <body>
  <header>
      <img src="assets/logo.svg" alt="logo" />
      <nav>
        <a class="active" onclick="toggleNav(this)">HOME</a>
        <a  onclick="toggleNav(this)">SYLLABUS</a>
        <a  onclick="toggleNav(this)">COURSE</a>
      </nav>
      <div>
      <?=$htmlOutput?>
      </div>
    </header>
    <!-- <header>
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
        
        
          
        </div>
        </div>
      </nav>
    </header> -->