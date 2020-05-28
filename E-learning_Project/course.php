<?php
session_start();
include_once('DB_Connect/connection.php');
include_once('DB_Connect/procedures.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);

if (isset($_SESSION['loginStatus'])) {
  $getUserProgress = str_replace("::uID::", $_SESSION['userID'], $getUserProgress);
  $sqlUserProgress = $getUserProgress;
  $resultUserProgress = $conn->query($sqlUserProgress);
  $aProgressArray = [];
  if ($resultUserProgress->num_rows > 0) {
    // output data of each row
    while ($row = $resultUserProgress->fetch_assoc()) {
      $newObj = new stdClass;
      $newObj->status = $row['statusVariabel'];
      $newObj->courseName = $row['courseName'];
      array_push($aProgressArray, $newObj);
    }
  } else {
    echo "0 results";
  }
}



include_once('components/compTop.php');

?>
<!-- 27/04/20 - 15.35 - Daniel har indsat diverse div -->
<span id="background" class="margin-top">
  <img src="assets/Polygon 1.svg" alt="" />
  <img src="assets/Polygon 2.svg" alt="" />
</span>
<main id="courseMain">
  <div id="sideContent">
    <h1>Course: Learning relational databases</h1>
    <div id="divContentContainer">
      <div id="divContent">
        <div id="mainContent">
<<<<<<< HEAD
=======
          <h2>To start a course:</h2>
          <br>
          <p>Use the navigation to the right</p>
          <br>
          <p>OR</p>
          <br>
          <p>Use the next button to start from the begining</p>
>>>>>>> 20b04a88d70a41dc2923a903baca9a51b8465afc
        </div>
        <div id="divNavigationButtons">
          <?php include_once('components/navigation.html') ?>
          <!-- 27/04/20 - 15.35 - Daniel har indsat next og back button comp her -->
        </div>
      </div>

      <div id="divNavigation">
        <?php

        if ($result->num_rows > 0) {
          // output data of each row
          $index = 2;
          while ($row = $result->fetch_assoc()) {

            $sData = json_decode($row['courseContent']);

            echo '<button onclick="showOptions(\'contentOptions' . $row['courseID'] . '\')" class="btnDropdown">' . $row['courseName'] . ' <i class="fa fa-chevron-down" style="font-size:24px"></i></button>
            <div id="contentOptions' . $row['courseID'] . '" class="dropdown-content">
                <a href="#" id="' . $index . '" onclick="fetchIntroduction(\'' . $row['courseID'] . '\'); changePlacement(' . $index++ . ');">' . $sData->shortDescription . '</a>
                <a href="#" id="' . $index . '" onclick="fetchExample(\'' . $row['courseID'] . '\'); changePlacement(' . $index++ . ');">Example</a>
                <a href="#" id="' . $index . '" onclick="fetchSummery(\'' . $row['courseID'] . '\'); changePlacement(' . $index++ . ');">Summery</a>
                <a href="#" id="' . $index . '" onclick="fetchQuiz(\'' . $row['courseID'] . '\'); changePlacement(' . $index++ . ');">Quiz</a>
            </div>';
          }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>

      </div>
    </div>
  </div>
  <div id="divSearchResult" class="searchResult">
  </div>
</main>


<?php
include_once('components/compBottom.php');
?>
<script>
  var obj = <?php echo json_encode($aProgressArray); ?>;
  setBookmark(obj);
</script>