<?php
if (!isset($_SESSION)) {
    session_start();
}

$titre = 'Mes Capteurs';
include('haut_de_page.php');
require_once('../modele/capteur.php');

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
<h1>Capteurs</h1>
<div class="connexion-inscription">
    <form method="POST" action="../controller/capteur.php?piece=<?php echo($idpiece . "&maison=" . $idmaison); ?>">


        <select id="choix" name="type" required>
            <option value="">Type de capteur</option>
            <option value="temp">Température</option>
            <option value="light">Illumination</option>
            <option value="presence">Présence</option>
            <option value="son">Son</option>
        </select>
        <input id="case" type="text" name="nom_capteur" placeholder="Nom du Capteur" required/>
        <input id="bouton3" type="submit" name="envoi" value="Ajouter"/>
        <a id="bouton3" href="../controller/piece.php?maison=<?php echo $idmaison ?>">Retour aux pièces</a>
    </form>
    <br>
    <form method="POST" action="../controller/capteur.php?piece=<?php echo($idpiece . "&maison=" . $idmaison); ?>">
        <input id="bouton3" type="submit" name="refresh" value="Rafraichir les capteurs">
    </form>

</div>

<div class=" table-responsive-vertical shadow-z-1">
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Valeur</th>
            <th>Unité</th>
            <th>Etat batterie</th>
            <th>Supprimer</th>
        <tr>
        </thead>
        <tbody>
        <?php
        foreach ($capteur_piece as $row) {
            ?>
            <tr>
                <td data-title="Nom">
                    <a href="../controller/capteur.php?capteur=<?php echo $row['ID_Capteurs'] ?>"><?php echo $row['nom'] ?></a>
                </td>
                <td data-title="Type">
                    <?php echo $row['Type'] ?></td>
                <td data-title="Valeur">
                    <?php echo $row['Valeur'] ?></td>
                <td data-title="Unité">
                    <?php echo $row['unite'] ?></td>
                <td data-title="Etat batterie">
                    <?php echo $row['Etat_Batterie'] ?></td>
                <td data-title="Supprimer"><a
                            href="../controller/capteur.php?supprCapteur=<?php echo $row['ID_Capteurs'] ?>&piece=<?php echo($idpiece . "&maison=" . $idmaison); ?>">
                        <img border="0" alt="supprimer" src="../vue/img/img_96165.svg" width="20" height="20">
                    </a></td>

            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>


</div>
<h1>Actionneurs</h1>
<div class="connexion-inscription">
    <form method="POST" action="../controller/actionneur.php?piece=<?php echo($idpiece . "&maison=" . $idmaison); ?>">


        <select id="choix" name="type" required>
            <option value="">Type d'actionneur</option>
            <option value="temp">Moteur</option>
            <option value="light">Volets</option>
            <option value="presence">Alarme</option>
            <option value="son">Climatisation</option>
        </select>
        <input id="case" type="text" name="nom_act" placeholder="Nom de l'actionneur" required/>
        <input id="bouton3" type="submit" name="envoi" value="Ajouter"/>
        <a id="bouton3" href="../controller/piece.php?maison=<?php echo $idmaison ?>">Retour aux pièces</a>


    </form>
</div>
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