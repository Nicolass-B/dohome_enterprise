<?php

if (!isset($_SESSION)) {
    session_start();
}

$titre = "Actionneur";


require_once '../Modele/init_connexion_bdd.php';
require_once '../Modele/actionneur.php';
require_once '../Modele/ajouts.php';
require_once '../Modele/piece.php';

if (isset($_GET['act'])) {
    $Actionneur = new Capteur($_GET['capteur'], $bdd);
    $titre = $Actionneur->typeactionneur[0];
    $Actionneur->get_valeur_history();
    $dataval = json_encode($Actionneur->histo_valeur);
    $datadate = json_encode($Actionneur->histo_date);

    include('../vue/mes_actionneurs.php');

} else {
    // ici le capteur n'est pas précisé dans le formulaire
    // on renvoie tous les capteurs de la pièce séléctionnée
    $idmaison = 1; //$_SESSION['idmaison']; to add quand on aura les sessions
    $idpiece = $_GET['piece'];
    //TODO ajouter les sessions et remplacer ici.
    $pieces = getPiecesfromMaison($bdd, $idmaison);
    $capteur_piece = getCapteursfromPiece($bdd, $idpiece);
    include('../Vue/capteur.php');
}