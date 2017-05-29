<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 29/05/2017
 * Time: 14:26
 */
include_once ('../modele/messagerie.php');


//TODO DELETE LES SESSIONS §§§§

$_SESSION['idUser'] = 1;

if (isset($_GET['msg']) && !empty($_GET['msg'])) {
    // Si l'utilisateur veut un message individuel

    $message = getUniqueMessage($dbh, $_GET['msg'], $_SESSION['idUser']);
    $titre = 'Message de '. $message['Nom'];
    include_once('../vue/message.php');
} else {
    // Si on souhaite un affichage général
    include '../controller/messagerie.php';
}

