<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>
    <title> Dashboard </title>
</head>
<?php include("haut_de_page_backoffice.php"); ?>

<body>


<body>
<div class="information">
<div class="dashAdmin">
    <section2>
        <a class="LienImage" href="../controller/analyse_backoffice.php"><img class="analyse" src="../vue/img/analyse.png" alt="logo analyse"/></a>
        <p> Analyse des comptes</p>
    </section2>
    <section2>
        <a class="LienImage" href="../vue/messagerie_backoffice.php"><img class="messagerie" src="../vue/img/messagerie.png" alt="logo message"/></a>
        <p> Messagerie interne</p>
    </section2>
</div>
</div>
</body>
<?php include("bas_de_page.php"); ?>

</html>