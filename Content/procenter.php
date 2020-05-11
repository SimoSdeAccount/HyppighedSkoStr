<?php
/*include("DataTabel/brugerskodata.php");
$readSkodData = new brugerskodata(mysqli_connect("localhost", "root", "", "skodb"));
$skodData = $readSkodData->readSko();
$storst = $mindst = $skodData[0];
for($i = 0; $i < count($skodData); $i++)
{
    if($skodData[$i] < $mindst)
    {
        $mindst = $skodData[$i];
    }
    if($skodData[$i] > $storst)
    {
        $storst = $skodData[$i];
    }
}
$foreKomster = array();
$counter = 0;
for($i = $mindst; $i <= $storst; $i++)
{
    $forekomst = 0;
    for($j = 0; $j < count($skodData); $j++)
    {
        if($skodData[$j] == $mindst)
        {
            $forekomst++;
        }
    }
    $foreKomster[$counter] = array($mindst, $forekomst);
    $counter++;
    $mindst++;
}
$forekomstSum = 0;
for($i = 0; $i < count($foreKomster); $i++)
{
    $forekomstSum += $foreKomster[$i][1];
}*/
?>
<header class="mainAsideHeaders">
    Bum bum
</header>
<section class="mainAsideSections">
    Bummelum
    <?php
  /*  echo "<table id='skoProcentTabel'>";
    for($i = 0; $i < count($foreKomster); $i++)
    {
        echo "<tr>";
        echo "<td>";
        echo  $foreKomster[$i][0] . ": " . round($foreKomster[$i][1]/$forekomstSum,2)*100 . "%";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>"*/
    ?>
</section>