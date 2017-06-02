<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 02/06/2017
 * Time: 09:27
 */


function CreateSecondaryUser(PDO $bdd,$id_user){

}


function updateSecondaryUser(PDO $bdd,$id_user){
}


function getSecondaryUser(PDO $bdd,$id_user){

}

function deleteSecondaryUser(PDO $bdd,$id_user){
    $bdd->query('DELETE * FROM client_secondaire  WHERE ID_USER=\'' . $id_user . '\'');
}