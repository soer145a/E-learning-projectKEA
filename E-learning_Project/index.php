<?php 
include_once('components/compTop.php');



?>
    <main>
      <div id="mainContent"></div>
      <div id="sideContent">
        <?php 
          for($i = 1; $i<11; $i++){
            echo '<div class="topicItem" id="topicItem'.$i.'" onclick="changeMainContent(this)" data-courseID="ID'.$i.'">
            <h1 class="topicNumber">'.$i.'</h1>
            <div class="topicInfo">
              <p class="topicText">Course Content '.$i.'</p>
              <p class="topicExtension"> - About Topic</p>
            </div>
          </div>';
          }
        ?>
        
      </div>
    </main>
<?php 
include_once('components/compBottom.php');
?>
