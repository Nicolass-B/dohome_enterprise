<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/haut_bas_de_page.css"/>
    <title> Mon profil </title>
</head>

<?php $titre = "Messagerie"; include("haut_de_page.php"); ?>
<link rel="stylesheet" href="../css/tableau.css">
<body>
<div>
    <h1>
        <a href="../controller/redigermessage.php" style="color: white"> Rédiger un message</a>
    </h1>

</div>
<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>Date</th>
                <th>Expéditeur</th>
                <th>Titre</th>
            <tr>
            </thead>
            <tbody>
            <?php
            //TODO quand on aura les POST bien mis, modifier le tableau pour aller taper dans un controleur piece qui présente les capteurs d'une pice si post et tout si rien
            foreach ($messagesUser as $row) {
                //var_dump($row);
                ?>
                <tr>
                    <td data-title="Date"><?php echo $row['Date'] ?></td>
                    <td data-title="Expéditeur"><?php echo $row['Nom'] ?></td>
                    <td data-title="Titre">
                        <a href="../controller/voirmessage.php?msg=<?php echo $row['ID_Message'] ?>"><?php echo $row['Titre'] ?></a>
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
