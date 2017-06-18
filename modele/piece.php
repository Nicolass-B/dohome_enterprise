<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 20/05/2017
 * Time: 20:45
 */

function getPiecesfromMaison(PDO $dbh, $idmaison)
{   // ICI ON RETOURNE DANS $data LES PIECES DE L'UTILISATEUR POUR SA MAISON

    $query = "SELECT ID_pieces,Nom, superficie FROM pieces WHERE ID_Maison =:idmaison";
    $sql = $dbh->prepare($query);
    $sql->execute(['idmaison' => $idmaison]);
    $data = $sql->fetchAll();
    return $data;
}

function getCapteursfromPiece(PDO $dbh, $idpiece)
{
    // permet ded retourner tous les capteurs d'une pièce avec des trucs fu
    $query = "SELECT * FROM `capteurs` WHERE `capteurs`.`ID_piece`=:idpiece
              ORDER BY `capteurs`.`ID_Capteurs` ASC";
    $sql = $dbh->prepare($query);
    $sql->execute(['idpiece' => $idpiece]);
    $data = $sql->fetchAll();
    return $data;
}

function getActionneursfromPiece(PDO $dbh, $idpiece)
{
    // permet ded retourner tous les capteurs d'une pièce avec des trucs fu
    $query = "SELECT ID_Actionneur, is_active, type FROM actionneur ORDER BY ID_Actionneur ASC";
    $sql = $dbh->prepare($query);
    $sql->execute(['idpiece' => $idpiece]);
    $data = $sql->fetchAll();
    return $data;
}


function suppressionPiece(PDO $bdd, $idpiece){
    $query = "DELETE FROM pieces WHERE ID_pieces = :idpiece";
    $sql = $bdd->prepare($query);
    $sql->execute(['idpiece' => $idpiece]);
}
