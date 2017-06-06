<?php
include 'init_connexion_bdd.php';

// vérif mdp dans BDD
function takeMdp(PDO $dbh, $login)
{
    $reponse = $dbh->query('SELECT mot_de_passe FROM user  WHERE Mail=\'' . $login . '\'');
    $affiche = $reponse->fetch();
    return $affiche;
}
// vérif user
function takeUtilisateurs(PDO $dbh, $login)
{
    $reponse = $dbh->query('SELECT COUNT(mail) AS nb_ocu FROM user WHERE Mail=\'' . $login . '\'');
    $affiche = $reponse->fetch();
    return $affiche;
}
//renvoi l'id d'un utilisateur en fonction de son mail
function takeIdUser(PDO $bdd,$mail){
   $reponse = $bdd-> prepare('SELECT id FROM  user WHERE Mail=\'' . $mail . '\' ');
   $reponse->execute();
   $affich = $reponse->fetch();

   return $affich;
}
//renvoi les info de l'utilisateur pour le profil utilisateur
function takeInfoUser(PDO $bdd,$mail){
    $reponse = $bdd-> prepare('SELECT Nom,Prenom,telephone,Adresse,sexe,date_naissance,mot_de_passe,avatar FROM  user WHERE Mail=\'' . $mail . '\' ');
    $reponse->execute();
    $affich = $reponse->fetch();
    return $affich;
}

function updateAvatarUser(PDO $bdd,$id_user,$extensioUpload){
    $updateavatar= $bdd->prepare('UPDATE user SET avatar= :avatar WHERE id=:id');
    $updateavatar-> execute(array(
        'avatar'=>$id_user.".".$extensioUpload,
        'id'=>$id_user
    ));
}

