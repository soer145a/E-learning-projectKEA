<?php 
include_once('components/compTop.php');
include_once('DB_Connect/connection.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);



?>
    <main>
      <div id="mainContent">
      </div>
      <div id="sideContent">
        <?php 
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $shortDescription = json_decode($row['courseContent']);
              
                echo '<div class="topicItem" id="topicItem'.$row['courseID'].'" onclick="changeMainContent(this)" data-courseID="ID'.$row['courseID'].'">
                <h1 class="topicNumber">'.$row['courseID'].'</h1>
                <div class="topicInfo">
                  <p class="topicText">'.$row['courseName'].'</p>
                  <p class="topicExtension"> '.$shortDescription->shortDescription.'</p>
                </div>
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
