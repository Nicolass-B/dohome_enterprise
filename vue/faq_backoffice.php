<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
    <title> Analyse des comptes </title>
</head>
<?php include("haut_de_page_backoffice.php"); ?>


<body>
<div class="faq_backoffice">
    <div class="information">
        <ul>
            <div class="menusec">
                <li><a href="../controller/analyse_backoffice.php">Analyse des comptes</a></li>
                <li class="enCours"><a href="../controller/faq_backoffice.php">FAQ</a></li>
            </div>
        </ul>
    </div>
</div>

</body>

<?php include("bas_de_page_backoffice.php"); ?>

</html>