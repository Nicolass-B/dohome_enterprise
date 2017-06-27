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

function updateCapteurPiece(PDO $dbh){
    $query = "SELECT t.Valeur, t.ID_capteur, datemesure FROM(
                                                      SELECT ID_capteur,MAX(Date_Mesure) AS datemesure
                                                      FROM historique_capteurs
                                                      GROUP BY ID_capteur) x
              JOIN historique_capteurs t ON x.ID_capteur = t.ID_capteur
                    AND x.datemesure = t.Date_Mesure";
    $sql = $dbh->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    $req = "UPDATE capteurs SET capteurs.Valeur=:valeur WHERE dohome.capteurs.ID_Capteurs=:id";
    $sql2 = $dbh->prepare($req);
    foreach ($data as $datum) {
        $sql2->execute(array(
            "valeur" => $datum["Valeur"],
            "id" => $datum["ID_capteur"]
        ));
    }
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
