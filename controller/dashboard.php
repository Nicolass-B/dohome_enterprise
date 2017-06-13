<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 02/06/2017
 * Time: 10:53
 */
if (!isset($_SESSION)) {session_start();}
//include ('../modele/maison.php');

//$affichePieces = getPiecesMaison($bdd,$_SESSION['id_maison']);

include '../vue/dashboard.php';