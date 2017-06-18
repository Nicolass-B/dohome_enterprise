
<?php
//TODO S'amuser avec la barre de recherche et des requete mysql LIKE
session_start();
require_once("modele/init_connexion_bdd.php");


if (isset($_GET['home']))
{
    if ($_GET['home'] == "form")
    {
        include("controller/traitement_connexion.php");
    }
    else if ($_GET['inscription'] == "verif")
    {
        include("controller/traitement_inscription.php");
    }
}
else if (!isset($_SESSION["id_user"]))
{
    //require("Vue/login.php");
    // On tombe sur la page d'accueil
    include("controller/home.php");
}