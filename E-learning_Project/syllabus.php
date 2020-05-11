<?php
session_start();
include_once('components/compTop.php');

$sData = file_get_contents('syllabus.json');
$jData = json_decode($sData);

$divWithSyllabus = "";

foreach ($jData as $key => $value) {
    $divWithSyllabus .= "<div><b>$key:</b> $value</div>";
}

?>
<span id="background">
    <img src="assets/Polygon 1.svg" alt="" />
    <img src="assets/Polygon 2.svg" alt="" />
</span>
<main>
    <!-- 04/05/20 - 13.30 - Daniel har lavet små ændringer til formen.  -->

    <div id="syllabusMainContent">
        <h1>Syllabus</h1>
        <?= $divWithSyllabus ?>
    </div>
</main>
<?php
include_once('components/compBottom.php');
?>