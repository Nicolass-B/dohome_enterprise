<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 20/05/2017
 * Time: 23:53
 */

function getMaisons(PDO $dbh, $iduser)
{

    // ICI ON RETOURNE DANS $data LES MAISONS DE L'USER

    $query = "SELECT Id,Nom FROM maison WHERE ID_user =:iduser";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser' => $iduser]);
    $data = $sql->fetchAll();
    return $data;
}
