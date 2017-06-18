<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 07/06/2017
 * Time: 13:57
 */
if (!isset($_SESSION)) {
    session_start();
}
include_once('../modele/utilisateurs_secondaire.php');


if (!empty($_POST['ajoutUserSec'])) {
    include('../vue/ajout_compte_secondaire.php');
}

if (isset($_POST['formulaireAjoutSec']) && !empty($_POST['formulaireAjoutSec'])) {

    if (!empty($_POST['nomUserSec'])
        && !empty($_POST['prenomUserSec'])
        && !empty($_POST['E-mailUserSec'])
        && !empty($_POST['passUserSec'])
        && !empty($_POST['confirmePasseUserSec'])
    ) {

        $nomUserSec = htmlentities($_POST['nomUserSec']);
        $prenomUserSec = htmlentities($_POST['prenomUserSec']);
        $mailUserSec = htmlentities($_POST['E-mailUserSec']);
        $passUserSec = htmlentities($_POST['passUserSec']);
        $confirmePasseUserSec = htmlentities($_POST['confirmePasseUserSec']);
        var_dump($mailUserSec);
        var_dump($_SESSION['Mail']);
        if ($mailUserSec != $_SESSION['Mail']) {
            if ($passUserSec == $confirmePasseUserSec) {
                createSecondaryUser($bdd, $nomUserSec, $prenomUserSec, $mailUserSec, $passUserSec, $_SESSION['id_user']);
                include('../controller/affichage_compte_secondaire.php');
            } else {
                $msg = 'Les mots de passe ne sont pas identiques';
                include('../vue/ajout_compte_secondaire.php');
            }
        } else {
            $msg = 'Mail identique au compte principal';
            include('../vue/ajout_compte_secondaire.php');
        }

    } else {
        $msg = 'les champs ne sont pas tous rempli';
        include('../vue/ajout_compte_secondaire.php');
    }
}

if (!empty($_POST['supUserSec'])) {
    deleteSecondaryUser($bdd, $_SESSION['id_user'], $_POST['id_secondaire']);
    include('../controller/affichage_compte_secondaire.php');
}
if (!empty($_POST['modifUserSec'])) {


}