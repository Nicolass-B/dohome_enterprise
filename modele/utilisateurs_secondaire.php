<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 02/06/2017
 * Time: 09:27
 */
include ('init_connexion_bdd.php');

function createSecondaryUser(PDO $bdd, $nomSecondUser,$prenomSecondUser,$mailSecondUser,$passSecondUser,$id_user,$photo){
    $query=$bdd->prepare('INSERT INTO client_secondaire(nom,prenom,mail,pass,ID_USER,) VALUES(:nom,:prenom ,:mail, :pass, :ID_USER,:photo)');
    $query->execute(array(
        'nom'=>$nomSecondUser,
        'prenom'=>$prenomSecondUser,
        'mail' => $mailSecondUser,
        'pass' => $passSecondUser,
        'photo' => $photo,
        'ID_USER' => $id_user
    ));
}

function updateSecondaryUser(PDO $bdd,$id_user){
}

function getSecondaryUser(PDO $bdd,$id_user){
    $rep=$bdd->prepare('SELECT nom,prenom,ID_Secondaire,photo FROM client_secondaire  WHERE ID_USER=\'' . $id_user . '\'');
    $rep->execute();
    $infoSecondaryUser =  $rep -> fetchAll();
    return $infoSecondaryUser;
}

function deleteSecondaryUser(PDO $bdd,$id_user,$id_secondaire){
    $reponse =$bdd->prepare('DELETE FROM client_secondaire  WHERE ID_Secondaire=\'' . $id_secondaire . '\' and ID_USER=\'' . $id_user . '\'');
    $reponse->execute();
}

function getnivSecurit(PDO $bdd,$mailUserSec){
    $reponse = $bdd->prepare('SELECT niveau_securite  FROM client_secondaire WHERE mail=\'' . $mailUserSec . '\'');
    $reponse->execute();
    $affiche = $reponse->fetch();
    $niveauSecurit =$affiche['niveau_securite'];
    return $niveauSecurit;
}

function verifmailSecondaryUser(PDO $bdd,$mailUserSec){
    $reponse = $bdd->prepare('SELECT COUNT(mail) AS nb_ocu FROM client_secondaire WHERE mail=\'' . $mailUserSec . '\'');
    $reponse->execute();
    $affiche = $reponse->fetch();
    if($affiche['nb_ocu']==1){
        return true;
    }
    else{
        return false;
    }
}

function takemdpSecondaryUser(PDO $bdd,$mailUserSec){
    $reponse = $bdd->prepare('SELECT Pass FROM client_secondaire  WHERE Mail=\'' . $mailUserSec . '\'');
    $reponse->execute();
    $affiche = $reponse->fetch();
    $mdpSecondaryUser = $affiche['Pass'];
    return $mdpSecondaryUser;
}

function getMailComptePrincipal(PDO $bdd,$mailUserSec){
    $reponse = $bdd->prepare('SELECT Mail,id_user  FROM  user  WHERE id_user=(SELECT ID_USER FROM client_secondaire WHERE mail=\'' . $mailUserSec . '\' )');
    $reponse->execute();
    $affiche = $reponse->fetch();
    return $affiche;
}

