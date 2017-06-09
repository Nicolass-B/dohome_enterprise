<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 20/05/2017
 * Time: 23:53
 */
include "init_connexion_bdd.php";
function getMaisons(PDO $dbh, int $iduser)
{

    // ICI ON RETOURNE DANS $data LES MAISONS DE L'USER

    $query = "SELECT Id,Nom FROM maison WHERE ID_user =:iduser";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser' => $iduser]);
    $data = $sql->fetchAll();
    return $data;
}
getMaisons()

function getPiecesMaison(PDO $bdd, int $idmaison)
{
    $query = "SELECT ID_pieces,Nom FROM pieces WHERE ID_Maison =:idmaison";
    $sql = $bdd->prepare($query);
    $sql->execute(['idmaison' => $idmaison]);
    $data = $sql->fetchAll();
    var_dump($data);
    return $data;
}
getPiecesMaison($bdd,1);
