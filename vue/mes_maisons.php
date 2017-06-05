<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maison</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<br>
<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Suppr?</th>
            <tr>
            </thead>
            <tbody>
            <?php
            //TODO quand on aura les POST bien mis, modifier le tableau pour aller taper dans un controleur piece qui présente les capteurs d'une pice si post et tout si rien
            foreach ($maison as $row) {
                var_dump($row);
                ?>
                <tr>
                    <td data-title="ID"><?php echo $row['Id'] ?></td>
                    <td data-title="Nom">
                        <a href="../controller/piece.php?maison=<?php echo $row['Id'] ?>"> <?php echo $row['Nom'] ?> </a>
                    </td>
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