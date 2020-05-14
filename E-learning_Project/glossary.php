<?php
session_start();
include_once('components/compTop.php');

$sData = file_get_contents('glossary.json');
$jData = json_decode($sData);

$divWithGlossary = "";

foreach ($jData as $key => $value) {
    $divWithGlossary .= "<div><b>$key:</b> $value</div>";
}

?>
<span id="background">
    <img src="assets/Polygon 1.svg" alt="" />
    <img src="assets/Polygon 2.svg" alt="" />
</span>
<main>
    <!-- 04/05/20 - 13.30 - Daniel har lavet små ændringer til formen.  -->

    <div id="glossaryMainContent">
        <h1>GLOSSARY</h1>
        <?= $divWithGlossary ?>
    </div>
</main>
<?php
include_once('components/compBottom.php');
?>