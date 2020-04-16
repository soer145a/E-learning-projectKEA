<?php 
session_start();
include_once('DB_Connect/connection.php');
$sql = "SELECT courseID,courseName,courseContent FROM courses";
$result = $conn->query($sql);


include_once('components/compTop.php');
?>
    <main>
      <div id="mainContent">
      <div id="divInjectContentHere">

<div id="divContentTitle">
    <h1>What is a relational database?</h1>
</div>
<div id="divContentDescription">
    <p>A relational database is a database consisting of two or more tables that each are related to one
        or
        more of the other tables in the database. They create relationships between one another by
        referring
        to columns, also called attributes, in different tables.</p>
</div>
<div id="divContentImage">
    <img id="imgContent" src="">
</div>
<form id="divQuiz">
    <p id="pQuestion">Hvad er bla bla?</p>
    <label for="radioAnswer1"><input name="answer" type="radio" id="radioAnswer1"> Answer option 1</label>
    <label for="radioAnswer2"><input name="answer" type="radio" id="radioAnswer2"> Answer option 2</label>
    <label for="radioAnswer3"><input name="answer" type="radio" id="radioAnswer3"> Answer option 3</label>
    <label for="radioAnswer4"><input name="answer" type="radio" id="radioAnswer4"> Answer option 4</label>  
    <button id="buttonSubmit">Submit answer</button>                
</form>
</div>
      </div>
      <div id="sideContent">
        <?php 
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
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
