<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 04/06/2017
 * Time: 17:35
 */
require_once '../modele/backoffice.php';
require_once '../modele/messagerie.php';
$_SESSION['id_user'] = 3;
if (!isset($_SESSION)) {
    session_start();
} else if (!isAdmin($bdd, $_SESSION['id_user'])) {
    // We don't want any unauthorized ppl
    header('HTTP/1.0 403 Forbidden');
    die('You are not allowed to access this file.');
} else {
    if (isset($_GET['msg']) && !empty($_GET['msg'])) {
        // Si l'utilisateur veut un message individuel
        include('../controller/voirmessage.php?msg=' . $_GET['msg']);
    } else {


        // Si on souhaite un affichage général
        if (!isset($_POST['id'])) {
            //par défaut c'est la boite mail de l'admin qui s'affiche
            $_POST['id'] = $_SESSION['id_user'];
        }
        $messagesUser = getMessageUser($bdd, $_POST['id']);
        $messageSent = getUserSentMessages($bdd, $_POST['id']);
        $userList = getUserList($bdd);
        include '../vue/messagerie_backoffice.php';
    }
}


