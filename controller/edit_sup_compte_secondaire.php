<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 07/06/2017
 * Time: 13:57
 */
include ('../modele/utilisateurs_secondaire.php');
if (!isset($_SESSION)) {session_start();}


if(!empty($_POST['ajoutUserSec'])){

}

elseif (!empty($_POST['supUserSec'])){
    deleteSecondaryUser($bdd,$_SESSION['id_user']);
}
elseif (!empty($_POST['modifUserSec'])){

}