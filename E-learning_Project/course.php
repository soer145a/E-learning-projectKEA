<?php 
session_start();
include_once('DB_Connect/connection.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);


include_once('components/compTop.php');
?>
    <main id="courseMain">
      <div id="mainContent">
    <h2>Welcom to Databases 101</h2>
    <br><br>
    <p>Choose a topic to dive into, or start here at the bottom!</p>
    <?php include_once('components/navigation.html')?>
      </div>
      <div id="sideContent">
        <?php 
          if ($result->num_rows > 0) {
            // output data of each row
            
            while($row = $result->fetch_assoc() ) {
              
              $sData = json_decode($row['courseContent']);
              
                echo '<button onclick="showOptions(\'contentOptions'.$row['courseID'].'\')" class="btnDropdown">'.$row['courseName'].' <i class="fa fa-chevron-down" style="font-size:24px"></i></button>
            <div id="contentOptions'.$row['courseID'].'" class="dropdown-content">
                <a href="#" onclick="fetchIntroduction(\''.$row['courseID'].'\')">'.$sData->shortDescription.'</a>
                <a href="#" onclick="fetchExample(\''.$row['courseID'].'\')">Example</a>
                <a href="#" onclick="fetchSummery(\''.$row['courseID'].'\')">Summery</a>
                <a href="#" onclick="fetchQuiz(\''.$row['courseID'].'\')">Quiz</a>
            </div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        
      </div>
    </main>
<?php 
include_once('components/compBottom.php');
?>
