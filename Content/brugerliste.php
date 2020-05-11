<?php 
include("Klasser/brugerskodata.php");
$readBrugerData = new brugerskodata(mysqli_connect("localhost", "root", "", "skodb"));
$brugerData = $readBrugerData->read();
echo "<table id='brugerListeTabel'>";
echo "<tr>";
echo "<th class='brugerListeHeader'>";
echo "<h4 class='brugerListeTableH4'> Id </h4>";
echo "</th>";
echo "<th class='brugerListeHeader'>";
echo "<h4 class='brugerListeTableH4'> Navn </h4>";
echo "</th>";
echo "<th class='brugerListeHeader'>";
echo "<h4 class='brugerListeTableH4'> Mail </h4";
echo "</th>";
echo "<th class='brugerListeHeader'>";
echo "<h4 class='brugerListeTableH4'> Alder </h4>";
echo "</th>";
echo "<th class='brugerListeHeader'>";
echo "<h4 class='brugerListeTableH4'>skostørrelse </h4>";
echo "</th>";
echo "</tr>";
for($i = 0; $i < count($brugerData); $i++)
{
    echo "<tr class='brugerListeTableTrs'>";
    for($j = 0; $j < count($brugerData[$i]); $j++)
    {
        echo "<td class='brugerListTableTds'>" . $brugerData[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>"
?>
