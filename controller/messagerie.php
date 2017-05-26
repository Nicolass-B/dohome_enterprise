<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 21/05/2017
 * Time: 00:35
 */

require_once '../modele/initConnexionBDD.php';
require_once '../modele/messagerie.php';

/** COntroleur de la messagerie interne au site
 *  rattaché au modele et à la vue éponyme
 *
 */


if(!isset($_SESSION['idUser'])){
    try {
        http_redirect('../index.php');
        die("Vous n'êtes pas connecté, retour à la page d'accueil");
    }
    catch (Exception $e){
        echo (' bonbon, y\'a pas windows c\'est problématique non ?');
    }

} else {
    $messagesUser = getMessageUser($dbh, $_SESSION['idUser']);
    $messageSent = getUserSentMessages($dbh, $_SESSION['idUser']);

    if(isset($_GET['msg']) && !empty($_GET['msg'])){
        $message = getUniqueMessage( $dbh, $_GET['msg'], $_SESSION['idUser']);
        $titre = 'Message';
        include ('../vue/message.php');
    }

}

