<?php 
session_start();
include_once('DB_Connect/connection.php');
include_once('DB_Connect/procedures.php');
$getUserProgress = str_replace("::uID::",$_SESSION['userID'],$getUserProgress);
$sql = $getUserProgress;
$result = $conn->query($sql);
$aProgressArray = [];
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc() ) {
        $newObj = new stdClass;
        $newObj->status = $row['statusVariabel']; 
        $newObj->courseName = $row['courseName'];
        array_push($aProgressArray, $newObj);
    }
  } else {
          echo "0 results";
  }
$conn->close();
include_once('components/compTop.php');
?>

<div id="banner">
      <h1>Hello - Ready to learn about Relational Databases? Jump right in</h1>
      <a href="course.php"><button class="btn-secondary">BEGIN COURSE</button></a>
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
          <a href="course.php">BEGIN COURSE</a>
        </div>
      </section>
      <section class="sectionwrapper">
        <h2>MY PROGRESS</h2>
        <div class="container">
        <div id="totalProgress">
        </div>
        <div id="individualTopicProgress">
        
          <?php 
              foreach ($aProgressArray as $obj){
                $courseName = $obj->courseName;
                $progress = $obj->status;
                $percentages = $progress * 100 / 4;
                echo "<div class='iProgressItem'>
                <p>$courseName</p>
                <svg height='20' width='20' viewBox='0 0 20 20'>
          <circle r='10' cx='10' cy='10' fill='var(--color-five)'/>
          <circle r='5' cx='10' cy='10' fill='transparent' stroke='var(--color-six)' stroke-dasharray='calc($percentages * 31.42 / 100) 31.42' stroke-width='10'
          transform='rotate(-90) translate(-20)'/>
          <circle r='8' cx='10' cy='10' fill='white'/>
          <text x='5' y='11.5' class='svgText'>$progress / 4</text>
        </svg>        
      </div>";}     
          ?>
        </div>
        
        </div>
      </section>
    </main>

    <?php 
include_once('components/compBottom.php');
?>