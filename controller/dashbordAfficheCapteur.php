<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/06/2017
 * Time: 15:57
 */

include('../modele/init_connexion_bdd.php');

if (!isset($_SESSION)) {
    session_start();
}

$idPiece = $_GET['q'];
$noCapteur = 0;

$reponse = $bdd->query('SELECT Type,Valeur FROM capteurs WHERE ID_piece=\'' . $idPiece . '\'');
while ($affiche = $reponse->fetch()) {
    $noCapteur++;
    echo $affiche['Type'] . ":" . $affiche['Valeur'];
}
if ($noCapteur == 0) {
    echo 'Pas de capteur dans cette piece';
}
?>