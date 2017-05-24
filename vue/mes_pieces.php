<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maison</title>
    <link rel="stylesheet" href="../css/Maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("Haut-de-Page.php"); ?>

<body>

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
            foreach ($piece as $row) {
                var_dump($row);
                ?>
                <tr>
                    <td data-title="ID"><?php echo $row['ID_pieces'] ?></td>
                    <td data-title="Nom">
                        <a href="../controller/piece.php?piece=<?php echo $row['ID_pieces'] ?>"> <?php echo $row['Nom'] ?> </a>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>


<?php include("BasDePage.php"); ?>

</html>