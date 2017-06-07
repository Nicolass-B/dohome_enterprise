<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 21/05/2017
 * Time: 00:35
 */
if (!isset($_SESSION)) {session_start();}
require  '../modele/init_connexion_bdd.php';
require_once '../modele/messagerie.php';


/** COntroleur de la messagerie interne au site
 *  rattaché au modele et à la vue éponyme
 *
 */
//$_SESSION['id_user'] = 1; // utiisé à des fins de test parce que voilà, on a pas encore les sessions


if(!isset($_SESSION['id_user'])){
    try {
        http_redirect('../index.php');
        die("Vous n'êtes pas connecté, retour à la page d'accueil");
    }
    catch (Exception $e){
        echo (' bon, y\'a pas ça sur windows c\'est problématique non ?');
    }

} else {
    if(isset($_GET['msg']) && !empty($_GET['msg'])){
        // Si l'utilisateur veut un message individuel
        include ('../controller/voirmessage.php?msg=' . $_GET['msg']);
    }else{
        // Si on souhaite un affichage général


        $messagesUser = getMessageUser($bdd, $_SESSION['id_user']);
        $messageSent = getUserSentMessages($bdd, $_SESSION['id_user']);


        include '../vue/messagerie.php';
    }

}