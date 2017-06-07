<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 09/05/2017
 * Time: 11:44
 */

$dsn = 'mysql:dbname=dohome;host=localhost;charset=utf8';
$user = 'root';
$password = '';
try{
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo ' good';
}
catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
}


