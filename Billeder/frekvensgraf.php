<?php
include("../Klasser/grafdanner.php");
$tegn = new grafdanner(mysqli_connect("localhost", "root", "", "skodb"));
$tegn->tegnFrekGraf();
?>