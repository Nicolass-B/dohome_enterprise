<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 14/06/2017
 * Time: 11:39
 */
include_once ('../modele/backoffice.php');

if(isset($_GET['supprUser'])){
    deleteUser($bdd,$_GET['supprUser']);
}

$tableauUser = getUserList($bdd);
include ('../vue/analyse_backoffice.php');
