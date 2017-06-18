<?php
if (!isset($_SESSION)) {
    session_start();
}

$titre = "FAQ";


require_once("../modele/init_connexion_bdd.php");
require_once('../modele/faq.php');

$data = getFaq($bdd);
//var_dump($data);
foreach($data as $row){

    echo $row["question"] . " lellelelelele " . $row["reponse"] . "<br>";
}