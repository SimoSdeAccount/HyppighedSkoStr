<?php 
include("Events/FormPostEvents.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="Styles/mainStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header id="mainHeader">
            <h1> Skostørrelse hyppighed </h1>
        </header>
        <aside id="asideContent">
            <?php include("Content/menu.php"); ?>
        </aside>
        <main id="mainContent">
            <section id="mainSection">
                <?php include("Switch/contentswitch.php"); ?>
            </section>
            <aside id="mainAsideSection">
                <?php include("Content/mainAsideSection.php"); ?>
            </aside>
        </main>
    </body>
</html>