<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 24/05/2017
 * Time: 14:29
 */
include ( '../controller/mon_profil.php');
if(isset($_POST['envoiProfil'])){

    if(isset($_POST['newnom']) && !empty($_POST['newnom']) && $_POST['newnom']!=$infoUser['Nom']){
    $newnom = htmlentities($_POST['newnom']);
    $insertnom = $dbh-> prepare("UPDATE user SET Nom= ?" );

    }

}