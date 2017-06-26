<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 26/06/2017
 * Time: 12:20
 */
if (!isset($_SESSION)) {
    session_start();
}
include_once '../modele/init_connexion_bdd.php';
include ('../modele/utilisateurs.php');

if (isAdmin($bdd, $_SESSION['id_user'])) {
    echo 'true';
    //include("../vue/dashboard_backoffice.php");
} else {
    echo 'false';
    //include '../vue/dashboard.php';
}

var_dump( $_SESSION['id_user']['id_user']);
echo($_SESSION['id_user']);