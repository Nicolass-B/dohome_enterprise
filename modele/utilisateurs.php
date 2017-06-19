<?php
include 'init_connexion_bdd.php';

// vérif mdp dans BDD
function takeMdp(PDO $dbh, $login)
{
    $reponse = $dbh->query('SELECT mot_de_passe FROM user  WHERE Mail=\'' . $login . '\'');
    $affiche = $reponse->fetch();
    $mdp=$affiche['mot_de_passe'];
    return $mdp;
}
// vérif user
function verifUtilisateurs(PDO $dbh, $login)
{
    $reponse = $dbh->query('SELECT COUNT(mail) AS nb_ocu FROM user WHERE Mail=\'' . $login . '\'');
    $affiche = $reponse->fetch();
    if($affiche['nb_ocu']==1){
        return true;
    }
    else{
        return false;
    }
}



//renvoi l'id d'un utilisateur en fonction de son mail
function takeIdUser(PDO $bdd,$mail){
   $reponse = $bdd-> prepare('SELECT id_user FROM  user WHERE Mail=\'' . $mail . '\' ');
   $reponse->execute();
   $affich = $reponse->fetch();

   return $affich;
}
//renvoi les info de l'utilisateur pour le profil utilisateur
function takeInfoUser(PDO $bdd,$mail){
    $reponse = $bdd-> prepare('SELECT Nom,Prenom,telephone,Adresse,sexe,YEAR(date_naissance) as years, MONTH(date_naissance) as months, DAY(date_naissance) as days,mot_de_passe,avatar FROM  user WHERE Mail=\'' . $mail . '\' ');
    $reponse->execute();
    $affich = $reponse->fetch();
    return $affich;
}

function updateAvatarUser(PDO $bdd,$id_user,$extensionUpload){
    $updateavatar= $bdd->prepare('UPDATE user SET avatar= :avatar WHERE id_user=:id_user');
    $updateavatar-> execute(array(
        'avatar'=>$id_user.".".$extensionUpload,
        'id_user'=>$id_user
    ));
}

//fonction qui return vrai si l'utilisateur est un admin
function isAdmin(PDO $bdd,$mail){
    $reponse = $bdd->prepare('SELECT Is_admin FROM user WHERE Mail=\''.$mail.'\'');
    $reponse->execute();
    $affiche =$reponse->fetch();
    if($affiche['Is_admin']==1){
        return true ;
    }
    else{
        return false;
    }
}

