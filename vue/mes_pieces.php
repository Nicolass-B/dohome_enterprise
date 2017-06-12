<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mes pièces</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<br>
<div class="connexion-inscription">
    <form method="POST" action="../controller/newcapteur.php">
        <input type="text" name="idmaison" placeholder="<?php echo $_GET['maison'] ?>" required hidden/>
        <input type="text" name="nom_piece" placeholder="Nom de la pièce" required/>
        <input type="text" name="superficie" placeholder="Superficie" required/>
        <input type="submit" name="envoi" value="Valider"/>


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
            foreach ($piece as $row) {
                ?>
                <tr>
                    <td data-title="ID"><?php echo $row['ID_pieces'] ?></td>
                    <td data-title="Nom">
                        <a href="../controller/piece.php?piece=<?php echo $row['ID_pieces'] ?>&maison=<?php echo $idmaison?>"> <?php echo $row['Nom'] ?> </a>
                    </td>
                    <td data-title="Superficie"><?php echo $row['superficie'] ?> m²</td>
                    <td data-title="Supprimer"><a href="../controller/piece.php$suppr=<?php echo $row['ID_pieces'] ?>">
                            <img border="0" alt="W3Schools" src="../vue/img/img_96165.svg" width="20" height="20">
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