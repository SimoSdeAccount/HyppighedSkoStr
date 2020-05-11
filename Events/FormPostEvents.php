<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["skodataSubmit"]))
    {
        include("Klasser/brugerskodata.php");
        $insertSkodata = new brugerskodata(mysqli_connect("localhost", "root", "", "skodb"));
        $insertSkodata->setNavn($_POST["navn"]);
        $insertSkodata->setEmail($_POST["email"]);
        $insertSkodata->setAlder($_POST["alder"]);
        $insertSkodata->setSkostørrelse($_POST["skostoerrelse"]);
        $insertSkodata->insert();
    }
}
?>