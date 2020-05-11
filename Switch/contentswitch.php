<?php
//main content ved get events
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["dataform"]))
    {
        include("Content/dataform.php");
    }
    else if(isset($_GET["brugerliste"]))
    {
        include("Content/brugerliste.php");
    }
    else if(isset($_GET["graf"]))
    {
        include("Content/graf.php");
    }
    else 
    {
        include("Content/dataform.php");
    }
}
//maincontent ved post events
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["skodataSubmit"]))
    {
        include("Content/dataform.php");
    }
}
?>