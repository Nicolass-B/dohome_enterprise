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
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
}


