<?php
session_start();
include('DB_Connect/connection.php');
include_once('DB_Connect/procedures.php');
$sql = $getAverages;
$result = $conn->query($sql);
$conn->close();

include('DB_Connect/connection.php');
$sql = "SELECT * FROM loginreporting";
$resultL = $conn->query($sql);
if ($resultL->num_rows > 0) {
    // output data of each row
    while ($row = $resultL->fetch_assoc()) {
        $pLoggedIn = $row['InLogged'];
        $pNonLogged = $row['nonLogged'];
    }
} else {
    echo "0 results";
}

include_once('components/compTop.php');
echo "<script> sessionStorage.setItem('chosenPage','admin') </script>";
?>
<span id="background" class="margin-top">
    <img src="assets/Polygon 1.svg" alt="" />
    <img src="assets/Polygon 2.svg" alt="" />
</span>
<main id="statistics">
    <h1>Statistics</h1>
    <div>
        <a class="adminNav" href="admin.php">Course Overview &#8250;</a>
        <a class="adminNav active" href="statistics.php" style="text-decoration: underline;">Statistics</a>
    </div>
    <section>
        <h2>% of Requests from logged in users</h2>
        <div id="loggedInArea">
        <?php
        $total = $pLoggedIn + $pNonLogged;
        $percentages = $pLoggedIn / $total * 100;
        $percentages = round($percentages);
        echo "<svg height='20' width='20' viewBox='0 0 20 20'>
          <circle r='10' cx='10' cy='10' fill='var(--color-five)'/>
          <circle r='5' cx='10' cy='10' fill='transparent' stroke='var(--color-six)' stroke-dasharray='calc($percentages * 31.42 / 100) 31.42' stroke-width='10'
          transform='rotate(-90) translate(-20)'/>
          <circle r='8' cx='10' cy='10' fill='white'/>
          <text x='5' y='11.5' class='svgText'>$percentages%</text>
        </svg>"
        ?>
        </div>
    </section>
    <section>
        <h2 id="chartHeadline">Average user Progress</h2>
        <div id="chartArea">
        <?php
        $iDVNumber = 25;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $sTopicName = $row['topicName'];
                $iInputNumber = $row['average'];
                $calcPercentages = $iDVNumber * $iInputNumber / 100 * 100;
                echo "<div class='chartUnit'>
            <div class='barChart'>
                <div class='barPercentage' style='height: $calcPercentages%'> $calcPercentages%</div>
            </div>
            <div class='barText'>
                <p>$sTopicName</p>
            </div>
        </div>";
            }
        } else {
            echo "0 results";
        }

        ?>
        </div>
    </section>
</main>
<?php
include_once('components/compBottom.php');
?>