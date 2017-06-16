<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ma Maison</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<br>
<intro>Ajoutez une maison</intro>
<div class="connexion-inscription">
</br>
    <form method="POST" action="../controller/maison.php">
        <input id="case" type="text" name="nom" placeholder="Nom de la maison" required/>
        <input id="case" type="text" name="superficie" placeholder="Superficie" required/>
        <input id="bouton4" type="submit" name="envoi" value="Valider"/>
    </form>
</div>
<br>
<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Superficie</th>
                <th>Supprimer</th>
            <tr>
            </thead>
            <tbody>
            <?php
            foreach ($maison as $row) {
                //var_dump($row);
                ?>
                <tr>
                    <td data-title="ID"><?php echo $row['id_maison'] ?></td>
                    <td data-title="Nom">
                        <a href="../controller/piece.php?maison=<?php echo $row['id_maison'] ?>"> <?php echo $row['Nom'] ?> </a>
                    </td>
                    <td data-title="Superficie"><?php echo $row['superficie'] ?> m²</td>
                    <td data-title="Supprimer"><a href="../controller/maison.php?suppr=<?php echo $row['Id'] ?>">
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