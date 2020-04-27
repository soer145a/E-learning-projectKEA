<?php
session_start();
include_once('DB_Connect/connection.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);


include_once('components/compTop.php');
?>
<!-- 27/04/20 - 15.35 - Daniel har indsat diverse div -->

<main id="courseMain">  
  <div id="sideContent">
    <h1>Course: Learning relational databases</h1>
    <div id="divContentContainer">
      <div id="divContent">
        <div id="divInjectContentHere">
        </div>
        <div id="divNavigationButtons">
        <?php include_once('components/navigation.html') ?> <!-- 27/04/20 - 15.35 - Daniel har indsat next og back button comp her -->
        </div>
      </div>
      <div id="divNavigation">
        <?php
        if ($result->num_rows > 0) {
          // output data of each row

          while ($row = $result->fetch_assoc()) {

            $sData = json_decode($row['courseContent']);

            // 27/04/20 - 17.15 - Daniel har indsat functionskaldet setActive.call(this) for at vise hvilket nav element der er aktivt

            echo '<button onclick="showOptions(\'contentOptions' . $row['courseID'] . '\')" class="btnDropdown">' . $row['courseName'] . ' <i class="fa fa-chevron-down" style="font-size:24px"></i></button>
            <div id="contentOptions' . $row['courseID'] . '" class="dropdown-content">
                <a href="#" onclick="fetchIntroduction(\'' . $row['courseID'] . '\'); setActive.call(this)">' . $sData->shortDescription . '</a>
                <a href="#" onclick="fetchExample(\'' . $row['courseID'] . '\'); setActive.call(this)">Example</a>
                <a href="#" onclick="fetchSummery(\'' . $row['courseID'] . '\'); setActive.call(this)">Summery</a>
                <a href="#" onclick="fetchQuiz(\'' . $row['courseID'] . '\'); setActive.call(this)">Quiz</a>
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
</main>
<?php
include_once('components/compBottom.php');
?>