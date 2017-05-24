<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 24/05/2017
 * Time: 10:06
 */

include_once ('initConnexionBDD.php');

function getMessageUser(PDO $dbh,int $iduser){
    //renvoie les messages destinés à un utilisateur donné.
    $query = "SELECT Titre, contenu FROM messagerie WHERE ID_Destinataire=:iduser ORDER BY Time_Stamp DESC ";
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

