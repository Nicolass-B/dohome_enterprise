<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 20/05/2017
 * Time: 20:45
 */

function getPiecesfromMaison(PDO $dbh, $idmaison)
{

    // ICI ON RETOURNE DANS $data LES PIECES DE L'UTILISATEUR POUR SA MAISON

    $query = "SELECT ID_pieces,Nom FROM pieces WHERE ID_Maison =:idmaison";
    $sql = $dbh->prepare($query);
    $sql->execute(['idmaison' => $idmaison]);
    $data = $sql->fetchAll();
    return $data;
}

function getCapteursfromPiece(PDO $dbh, $idpiece)
{
    // permet ded retourner tous les capteurs d'une pièce avec des trucs fu
    $query = "SELECT `capteurs`.`ID_Capteurs`, `capteurs`.`Type`, `capteurs`.`Valeur`, `capteurs`.`unite`, `capteurs`.`Etat_Batterie` AS 'batt'   FROM `capteurs` WHERE `capteurs`.`ID_piece`=:idpiece
              ORDER BY `capteurs`.`ID_Capteurs` ASC";
    $sql = $dbh->prepare($query);
    $sql->execute(['idpiece' => $idpiece]);
    $data = $sql->fetchAll();
    return $data;
}

