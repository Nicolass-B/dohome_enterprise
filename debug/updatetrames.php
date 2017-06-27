<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 27/06/2017
 * Time: 22:46
 */
require'../modele/init_connexion_bdd.php';

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

updateCapteurPiece($bdd);

ECHO "SUCCESS";