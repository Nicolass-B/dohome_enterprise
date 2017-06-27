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
function trameToHisto(PDO $bdd, $team)
{
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=" . $team);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);

    $data_tab = str_split($data, 33);

    $sql = $bdd->prepare('INSERT INTO historique_capteurs(Id_mesure, Date_Mesure, Valeur, unite, ID_capteur) 
                            VALUES (NULL, :datemesure, :valeur, :unite, :idcapteur)');
    $lol = $bdd->query("SELECT * FROM compteurtrame");
    $lol = $lol->fetch();
    $compteur = $lol[0];

    for ($i = 6683+$compteur, $size = count($data_tab); $i < $size; $i++) {
        list($t, $o, $r, $c, $n, $valeur, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

        $date = $year ."-". $month ."-". $day ." ". $hour .":". $min .":". $sec;
        //$date = new DateTime($date);
        if($c == 1){ // done l'unité en focntion du type de capteur dans la trame
            $unite = 'C';
            $ID_capteur = 3;
        } else if ($c == 2){ //
            $unite = 'Cm';
            $ID_capteur = 5;
        } else if ($c == 3){ //illumination
            $unite = 'Lux';
            $ID_capteur = 4;
        }

        try {
            $sql->execute(array(
                'datemesure' => $date,
                'valeur' => hexdec($valeur),
                'unite' => $unite,
                'idcapteur' => $ID_capteur
            ));
        } catch (PDOException $e){
            echo '<br> erreur : ' . $e->getMessage(). "          val ". $valeur. "   chaine : ". $data_tab[$i];
        }
    }
    $lol = $bdd->prepare("UPDATE compteurtrame SET compteur =:total");
    $lol->execute(["total" => $size-6683]);

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
