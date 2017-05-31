<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 21/05/2017
 * Time: 23:02
 */

require('init_connexion_bdd.php');

//Fonction qui insert un user dans la Base de donnée
function insertUser(PDO $bdd,$nom,$prenom,$mot_de_passe,$telephone,$email,$adresse,$sexe,$annees,$mois,$jour){

    //met la date au format DATE de sql (format <annees-mois-jours>)
    $date_naissance = $annees.'-'.$mois.'-'.$jour ;

    $query=$bdd->prepare('INSERT INTO user(Nom, Prenom, mot_de_passe,telephone, Mail,adresse,sexe,date_inscription,date_naissance) VALUES(:nom, :prenom, :mot_de_passe,:telephone, :email ,:adresse, :sexe,NOW(),:date_naissance)');
    $query->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'mot_de_passe' => $mot_de_passe,
        'telephone' => $telephone,
        'email' => $email,
        'adresse' => $adresse,
        'sexe' =>$sexe,
        'date_naissance' => $date_naissance
    ));
}

//Fonction qui vérifie si le mot de passe et le mot de passe de confirmation son identique
function verif2MDP($pass,$passConfirme){
    if($pass==$passConfirme){
        return true;
    }
    else{
        return false;
    }

}

//Fonction qui vérifie si le mail entrez n'est pas déja dans la base de donnée
function verifMail(PDO $bdd,$mail){
    $reponse = $bdd->prepare('SELECT COUNT(mail) as nb_ocu FROM user WHERE Mail=\''.$mail.'\'');
    $reponse->execute();
    $affiche =$reponse->fetch();
    if($affiche['nb_ocu']==1){
        return true;
    }
    else{
        return false;
    }
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

