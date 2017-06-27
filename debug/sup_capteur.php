<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 26/06/2017
 * Time: 11:42
 */
require_once ('../modele/init_connexion_bdd.php');
include ('../modele/piece.php');

var_dump(getCapteursfromPiece($bdd,2));