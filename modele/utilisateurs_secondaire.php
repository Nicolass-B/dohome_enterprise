<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 02/06/2017
 * Time: 09:27
 */
include ('init_connexion_bdd.php');

function createSecondaryUser(PDO $bdd, $SecondUser,$prenomSecondUser,$mailSecondUser,$passSecondUser,$id_user){
    $query=$bdd->prepare('INSERT INTO client_secondaire(nom,prenom,mail,pass,ID_USER) VALUES(:nom,:prenom :mail, :pass, :ID_USER)');
    $query->execute(array(
        'nom'=>$SecondUser,
        'prenom'=>$prenomSecondUser,
        'mail' => $mailSecondUser,
        'pass' => $passSecondUser,
        'ID_USER' => $id_user
    ));
}

function updateSecondaryUser(PDO $bdd,$id_user){
}

function getSecondaryUser(PDO $bdd,$id_user){
}

function deleteSecondaryUser(PDO $bdd,$id_user,$mailUserSup){
    $reponse =$bdd->query('DELETE FROM client_secondaire  WHERE mail=\'' . $mailUserSup . '\' and ID_USER=\'' . $id_user . '\'');
    $reponse->execute();
}