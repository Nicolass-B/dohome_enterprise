<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes pièces</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<br>

<h2>Vous êtes dans la maison : <?php echo $nomMaison ;?></h2>

<div class="connexion-inscription">
    </br>
    <form method="POST" action="../controller/piece.php?maison=<?php echo $idmaison ?>">
        <input id="case" type="text" name="nom_piece" placeholder="Nom de la pièce" required/>
        <input id="case" type="text" name="superficie" placeholder="Superficie en m²" required/>
        <input id="bouton4" type="submit" name="envoi" value="Ajoutez une pièce"/>
        <a  id="bouton4" href="../controller/maison.php">Retour aux maisons</a>
    </form>
</div>
<br>
<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Superficie</th>
                <th>Supprimer</th>
            <tr>
            </thead>
            <tbody>
            <?php
            foreach ($piece as $row) {
                ?>
                <tr>
                    <td data-title="Nom">
                        <a href="../controller/capteur.php?piece=<?php echo $row['ID_pieces'] ?>&maison=<?php echo $idmaison ?>"> <?php echo $row['Nom'] ?> </a>
                    </td>
                    <td data-title="Superficie"><?php echo $row['superficie'] ?> m²</td>
                    <td data-title="Supprimer"><a href="../controller/piece.php?suppr=<?php echo $row['ID_pieces'] ?>">
                            <img border="0" alt="supprimer" src="../vue/img/img_96165.svg" width="20" height="20">
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