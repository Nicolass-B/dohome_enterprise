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
<div class="analyse_backoffice">
    <div class="information">
        <ul>
            <div class="menusec">
                <li class="enCours"><a href="../controller/analyse_backoffice.php">Analyse des comptes</a></li>
                <li><a href="../controller/faq_backoffice.php">FAQ</a></li>
            </div>
        </ul>
    </div>
</div>
<div class="table-responsive-vertical shadow-z-1">
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>ID Utilisateur</th>
            <th>Supprimer</th>
        <tr>
        </thead>
        <tbody>
        <?php
        foreach ($tableauUser as list($id_user, $nom, $prenom)) {

            ?>
            <tr>
                <td data-title="Prénom"><?php echo $prenom ?></td>
                <td data-title="Nom"><?php echo $nom ?></td>
                <td data-title="ID Utilisateur"><?php echo $id_user ?></td>
                <td data-title="Supprimer"><a
                            href="../controller/analyse_backoffice.php?supprUser=<?php echo $id_user ?>">
                        <img src="../vue/img/img_96165.svg" width="20" height="20">
                    </a></td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>

<?php include("bas_de_page.php"); ?>

</html>