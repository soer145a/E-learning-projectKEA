<?php 
include_once('DB_Connect/connection.php');

$sql = "SELECT * FROM courses";

$result = $conn->query($sql);

$oCourses = new stdClass;



for($i = 0; $i < $result->num_rows; $i++) {
  $oCourses->$i = $result->fetch_assoc();
};

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Teko:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="index.css" />
    <title>Document</title>
  </head>

  <body>
    <div class="modalBackground">
      <div class="modalWindow">
        <h2>DELETE TOPIC</h2>
        <h3>Are you sure you want to delete this topic?</h3>
        <div>
          <button class="btn-quaternary" onclick="showModal(this)">CANCEL</button>
          <button class="btn-primary">OK</button>
        </div>
      </div>
    </div>
    <span id="background" class="margin-top">
      <img src="assets/Polygon 1.svg" alt="" />
      <img src="assets/Polygon 2.svg" alt="" />
    </span>
    <main id="topic">
      <h1>Course Topics</h1>
      <div id="sectionwrapper">
        <section>
        <?php 
            for($i = 0; $i < $result->num_rows; $i++) {
              echo '<div class="topic" data-courseid="'.$oCourses->$i["courseID"].'">
                      <h3>'.$oCourses->$i["courseName"].'</h3>
                      <a href="edit.html?id='.$oCourses->$i["courseID"].'">
                        <button class="btn-primary">EDIT</button>
                      </a>
                      <button class="btn-quaternary" onclick="showModal(this)">DELETE</button>
                    </div>';
            };
          ?>
        </section>
        <section>
          <a href="create_topic.html">
            <button class="btn-primary">CREATE TOPIC</button>
          </a>
        </section>
      </div>
    </main>
    
<?php 
include_once('components/compBottom.php');
?>
