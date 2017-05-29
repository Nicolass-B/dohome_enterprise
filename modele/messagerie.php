<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 24/05/2017
 * Time: 10:06
 */

require_once ('initConnexionBDD.php');

function getMessageUser(PDO $dbh,int $iduser){
    //renvoie les messages destinés à un utilisateur donné en entrée
    $query = "SELECT Titre, contenu, ID_Message, ID_Expediteur, Time_Stamp AS 'Date', Nom FROM messagerie 
                  JOIN user on ID_Expediteur = user.id
                  WHERE ID_Destinataire=:iduser ORDER BY Time_Stamp DESC";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser'=> $iduser]);
    $data = $sql->fetchAll();
    return $data;
}

function sendMessageToUser (PDO $dbh, int $idexp, int $iddest, string $titre, string $texte){
    // Permet d'envoyer un message
    // https://s-media-cache-ak0.pinimg.com/736x/19/ec/3f/19ec3f46ca09b4b2e91380f7d4ee45fe.jpg
    $query = "INSERT INTO messagerie(Titre, Contenu, ID_Expediteur, ID_Destinataire, Time_Stamp) 
                            VALUES (:titre, :content, :idexp, :iddest, NOW())";
    $sql = $dbh->prepare($query);
    $sql->execute([
        'idexp'=> $idexp,
        'iddest' => $iddest,
        'titre' => $titre,
        'texte' => $texte
    ]);
}

function getUserSentMessages (PDO $dbh, int $iduser){
    //renvoie les messages envoyés par l'utilisateur.
    $query = "SELECT Titre, contenu FROM messagerie WHERE ID_Expediteur=:iduser ORDER BY Time_Stamp DESC ";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser'=> $iduser]);
    $data = $sql->fetchAll();
    return $data;
}

/**
 * @param PDO $dbh
 * @param $idmessage
 * @param $iduser
 * @return mixed
 */
function getUniqueMessage(PDO $dbh, $idmessage, $iduser){
    $query = "SELECT Titre, contenu, ID_Expediteur, Time_Stamp AS 'Date', Nom FROM messagerie 
                  JOIN user on ID_Expediteur = user.id
                  WHERE ID_Destinataire=:iduser AND ID_Message=:idmessage";
    $sql = $dbh->prepare($query);
    $sql->execute(['iduser'=> $iduser, 'idmessage' => $idmessage]);
    $data = $sql->fetch();
    return $data;
}