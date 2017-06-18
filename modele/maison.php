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

    $query = "SELECT id_maison,Nom, superficie FROM maison WHERE ID_user =:iduser";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser' => $iduser]);
    $data = $sql->fetchAll();
    return $data;
}

function getPiecesMaison(PDO $bdd, int $idmaison)
{
    $query = "SELECT ID_pieces,Nom FROM pieces WHERE ID_Maison =:idmaison";
    $sql = $bdd->prepare($query);
    $sql->execute(['idmaison' => $idmaison]);
    $data = $sql->fetchAll();
    var_dump($data);
    return $data;
}


function suppressionMaison(PDO $bdd,int $id_user,int $idmaison){
    $query = "DELETE FROM maison WHERE ID_user =:id_user  AND  id_maison= :idmaison";
    $sql = $bdd->prepare($query);
    $sql->execute(array('id_user'=>$id_user,
        'idmaison' => $idmaison));
}
