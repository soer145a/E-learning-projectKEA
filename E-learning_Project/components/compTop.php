<?php
        if(isset($_SESSION['loginStatus'])){
          $sName = $_SESSION['firstName'].' '.$_SESSION['lastName'];
          $htmlOutput = "<h3 id='loginName'>Hi ".$sName."</h3><a href='profile.php'><button class='btn-primary'>PROFILE</button></a>
          <a href='logout.php'><button class='btn-tertiary'>LOG OUT</button></a>";
        }else{
          $htmlOutput = "<a href='signup.php'><button class='btn-primary'>SIGN UP</button></a>
          <a href='login.php'><button class='btn-tertiary'>LOG IN</button></a>
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
    <title>DB Academy</title>
    <!-- <link rel="stylesheet" href="main.css" /> -->
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="course.css" /> <!-- 27/04/20 - 15.35 - Daniel har tilføjet ref til course.css -->
    <link rel="stylesheet" href="signup.css" /> <!-- 04/05/20 - 12.35 - Daniel har tilføjet ref til signup.css -->
    <link rel="stylesheet" href="login.css" /> <!-- 04/05/20 - 12.35 - Daniel har tilføjet ref til login.css -->
  </head>
  <body>
  <header>
      <img src="assets/logo.svg" alt="logo" />
      <nav>
        <a href="index.php" data-navtag="index" onclick="setSessionData(this)">HOME</a>
        <a href="syllabus.php" data-navtag="syllabus" onclick="setSessionData(this)">SYLLABUS</a>
        <a href="course.php" data-navtag="course" onclick="setSessionData(this)">COURSE</a>
      </nav>
      <div>
      <?=$htmlOutput?>
      </div>
    </header>