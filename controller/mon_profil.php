<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../modele/utilisateurs.php');
//var_dump($_SESSION['Mail']);
$infoUser = takeInfoUser($bdd, $_SESSION['Mail']);
//var_dump($infoUser);
include('../vue/mon_profil.php');


?>



