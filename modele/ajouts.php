<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 20/05/2017
 * Time: 19:24
 */
//TODO RAJOUTER LES SESSIONS AUX AJOUTS

include('init_connexion_bdd.php');

function ajoutCapteur(PDO $bdd, $type, $idpiece)
{
    $query = $bdd->prepare('INSERT INTO capteurs(ID_Capteurs, Type, Valeur, Date_Installation, Etat_Batterie, ID_piece) VALUES (NULL, :type, -1, NOW(), 100, :idpiece) ');
    $query->execute(array(
        'type' => $type,
        'idpiece' => $idpiece
    ));
}

/**
 * @param PDO $bdd
 * @param $nom
 * @param $idmaison
 */
function ajoutPiece(PDO $bdd, $nom, $idmaison, $superficie)
{
    $query = $bdd->prepare('INSERT INTO pieces(ID_Maison, Nom, superficie) VALUES (:idmaison, :nom, :superficie)');
    $query->execute(array(
        'idmaison' => $idmaison,
        'nom' => $nom,
        'superficie' => $superficie
    ));
}

function ajoutMaison(PDO $bdd, $nom, $iduser, $superficie)
{
    $query = $bdd->prepare('INSERT INTO maison(Id, nbpieces, ID_user, Nom, superficie) VALUES (NULL ,0,:iduser,:nom, :superficie)');
    $query->execute(array(
        'nom' => $nom,
        'iduser' => $iduser,
        'superficie' => $superficie
    ));
}