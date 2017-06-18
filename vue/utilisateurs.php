<?php
/**
 * Created by PhpStorm.
 * User: clementmosser1
 * Date: 10/06/2017
 * Time: 13:03
 */
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Utilsateurs</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>
<?php include("haut_de_page_backoffice.php"); ?>

<body>

<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>Utilsateur</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date d'inscription</th>
            <tr>
            </thead>
            <tbody>
            <?php
            foreach ($piece as $row) {
                var_dump($row);
                ?>
                <tr>
                    <td data-title="ID"><?php echo $row['ID_pieces'] ?></td>
                    <td data-title="Nom">
                        <a href="../controller/piece.php?piece=<?php echo $row['ID_pieces'] ?>&maison=<?php echo $idmaison ?>"> <?php echo $row['Nom'] ?> </a>
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