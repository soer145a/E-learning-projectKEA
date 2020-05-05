<?php 
session_start();
include_once('DB_Connect/connection.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);


include_once('components/compTop.php');
?>

<div id="banner">
      <h1>Hello - Ready to learn about Relational Databases? Jump right in</h1>
      <a href="course.php" data-navtag="course" onclick="setSessionData(this)"><button class="btn-secondary">BEGIN COURSE</button></a>
    </div>
    <span id="background">
      <img src="assets/Polygon 1.svg" alt="" />
      <img src="assets/Polygon 2.svg" alt="" />
    </span>
    <main id="indexPage">
      <section class="sectionwrapper">
        <h2>LEARN</h2>
        <div class="container">
          <h3>Relational Databases</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
          </p>
          <a href="course.php" data-navtag="course" onclick="setSessionData(this)">BEGIN COURSE</a>
        </div>
      </section>
      <section class="sectionwrapper">
        <h2>MY PROGRESS</h2>
        <div class="container"></div>
      </section>
    </main>

    <?php 
include_once('components/compBottom.php');
?>