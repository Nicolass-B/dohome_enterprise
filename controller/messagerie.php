<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 21/05/2017
 * Time: 00:35
 */

require_once '../modele/initConnexionBDD.php';
require_once '../modele/messagerie.php';

session_start();
/** COntroleur de la messagerie interne au site
 *  rattaché au modele et à la vue éponyme
 *
 */
$_SESSION['idUser'] = 1; // utiisé à des fins de test parce que voilà, on a pas encore les sessions

if(!isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    try {
        http_redirect('../index.php');
        die("Vous n'êtes pas connecté, retour à la page d'accueil");
    }
    catch (Exception $e){
        echo (' bon, y\'a pas windows c\'est problématique non ?');
    }

} else {
    if(isset($_GET['msg']) && !empty($_GET['msg'])){
        // Si l'utilisateur veut un message individuel
        include ('../controller/voirmessage.php?msg=' . $_GET['msg']);
    }else{
        // Si on souhaite un affichage général

        $messagesUser = getMessageUser($dbh, $_SESSION['idUser']);
        $messageSent = getUserSentMessages($dbh, $_SESSION['idUser']);

        include '../vue/messagerie.php';
    }

}

