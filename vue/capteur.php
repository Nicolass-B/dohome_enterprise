
<?php
if (!isset($_SESSION)) {session_start();}

$titre = 'Mes Capteurs';
include('haut_de_page.php');
require_once('..\Modele\Capteur.php');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes pièces</title>
    <link rel="stylesheet" href="../css/maison.css"/>
    <link rel="stylesheet" href="../css/tableau.css"/>
</head>

<body>
<div class="connexion-inscription">
    <form method="POST" action="../controller/newcapteur.php">


        <select name="type" required>
            <option value="">Type de capteur</option>
            <option value="temp">Température</option>
            <option value="light">Illumination</option>
            <option value="presence">Présence</option>
            <option value="son">Son</option>
        </select>
        <select name="piece" required>
            <option value="">Sélectionnez une pièce</option>
            <?php
            foreach ($pieces as $row) {
                echo "<option value=" . $row['ID_pieces'] . ">" . $row['Nom'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="nom_capteur" placeholder="Nom du Capteur" required/>
        <input type="text" name="ajout" placeholder="1" hidden required/>
        <input id="bouton3" type="submit" name="envoi" value="Valider"/>


    </form>
</div>
<h1>Capteurs</h1>
<div class="table-responsive-vertical shadow-z-1">
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Valeur</th>
            <th>Unité</th>
            <th>Etat batterie</th>
        <tr>
        </thead>
        <tbody>
        <?php
        foreach ($capteur_piece as $row) {
            ?>
            <tr>
                <td data-title="ID">
                    <?php echo $row['ID_Capteurs'] ?></td>
                <td data-title="Nom">
                    <a href="../controller/capteur.php?capteur=<?php echo $row['ID_Capteurs'] ?>"><?php echo $row['Type'] ?></a>
                </td>
                <td data-title="Valeur">
                    <?php echo $row['Valeur'] ?></td>
                <td data-title="Unité">
                    <?php echo $row['unite'] ?></td>
                <td data-title="Etat batterie">
                    <?php echo $row['batt'] ?></td>

            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>


</div>
<h1>Actionneurs</h1>
<div class="table-responsive-vertical shadow-z-1">
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Activé</th>
        <tr>
        </thead>
        <tbody>
        <?php
        foreach ($actionneur_piece as $row) {
            ?>
            <tr>
                <td data-title="ID">
                    <?php echo $row['ID_Actionneur'] ?></td>
                <td data-title="Nom">
                    <a href="../controller/capteur.php?actionneur=<?php echo $row['ID_Actionneur'] ?>"><?php echo $row['Nom'] ?></a>
                </td>
                <td data-title="Activé">
                    <?php echo $row['is_active'] ?></td>


            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>


</div>


    </body>

<?php include 'bas_de_page.php'; ?>