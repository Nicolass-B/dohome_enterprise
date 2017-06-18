<?php
if (!isset($_SESSION)) {
    session_start();
}

$titre = "FAQ";


require_once("../modele/init_connexion_bdd.php");
require_once('../modele/faq.php');

$data = getFaq($bdd);
//var_dump($data);
include ('../vue/faq.php');