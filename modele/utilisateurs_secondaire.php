<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 02/06/2017
 * Time: 09:27
 */
include ('init_connexion_bdd.php');

function createSecondaryUser(PDO $bdd, $nomSecondUser,$prenomSecondUser,$mailSecondUser,$passSecondUser,$id_user){
    $query=$bdd->prepare('INSERT INTO client_secondaire(nom,prenom,mail,pass,ID_USER) VALUES(:nom,:prenom ,:mail, :pass, :ID_USER)');
    $query->execute(array(
        'nom'=>$nomSecondUser,
        'prenom'=>$prenomSecondUser,
        'mail' => $mailSecondUser,
        'pass' => $passSecondUser,
        'ID_USER' => $id_user
    ));
}

function updateSecondaryUser(PDO $bdd,$id_user){
}

function getSecondaryUser(PDO $bdd,$id_user){
    $rep=$bdd->prepare('SELECT nom,prenom,ID_Secondaire FROM client_secondaire  WHERE ID_USER=\'' . $id_user . '\'');
    $rep->execute();
    $infoSecondaryUser =  $rep -> fetchAll();
    return $infoSecondaryUser;
}

function deleteSecondaryUser(PDO $bdd,$id_user,$id_secondaire){
    $reponse =$bdd->prepare('DELETE FROM client_secondaire  WHERE ID_Secondaire=\'' . $id_secondaire . '\' and ID_USER=\'' . $id_user . '\'');
    $reponse->execute();
}
