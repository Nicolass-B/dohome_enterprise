<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>

    <link rel="stylesheet" href="../css/tableau.css"/>

    <title>Messagerie</title>
</head>
<?php include("haut_de_page_backoffice.php"); ?>

<body>
<div>
    <h1>
        <a href="../controller/redigermessage.php" class="rediger"> Rédiger un message</a>
    </h1>
</div>
<div>
    <form method="POST" action="../controller/msg_admin.php">
        <select name="id" required>
            <option value=""></option>
            <?php

            foreach ($userList as $row) {
                echo "<option value=" . $row['id'] . ">" . $row['Nom'] . " " . $row['Prenom'] . "</option>";
            }
            ?>
        </select>
        <input class="rediger" type="submit" name="envoi" value="Répondre à cette personne"/>

</div>

<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>Date</th>
                <th>Expéditeur</th>
                <th>Destinataire</th>
                <th>Titre</th>
            <tr>
            </thead>
            <tbody>
            <?php
            foreach ($messagesUser as $row) {
                //var_dump($row);
                ?>
                <tr>
                    <td data-title="Date"><?php echo $row['Date'] ?></td>
                    <td data-title="Expéditeur"><?php echo $row['Nom'] ?></td>
                    <td data-title="Destinataire"><?php echo $row['desti'] ?></td>
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
</div>

</body>
<?php include("bas_de_page.php"); ?>
