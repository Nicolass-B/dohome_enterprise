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
    $reponse = $bdd-> prepare('SELECT Nom,Prenom,telephone,Adresse,sexe,date_naissance FROM  user WHERE Mail=\'' . $mail . '\' ');
    $reponse->execute();
    $affich = $reponse->fetch();
    return $affich;
}



function updateUser(PDO $bdd, $id_client, $infos)
{

    $fail = NULL;
    if (!empty($infos['nom'])) {
        $req = $bdd->prepare('UPDATE user SET nom = :nom WHERE id=:id_client');
        $req->execute(array(':nom' => htmlspecialchars($infos['nom']), 'id_client' => $id_client));
        $req->fetch();
    }

    if (!empty($infos['prenom'])) {
        $req = $bdd->prepare('UPDATE user SET Prenom = :prenom WHERE id=:id_client');
        $req->execute(array(
            'prenom' => htmlspecialchars($infos['prenom']), // pour escape les specialschars
            'id_client' => $id_client));
        $req->fetch();
    }

    if (!empty($infos['email'])) {
        if (isEmail($infos['email'])) {
            $req = $bdd->prepare('UPDATE user SET Mail = :email WHERE id=:id_client');
            $req->execute(array(
                'email' => htmlspecialchars($infos['email']),
                'id_client' => $id_client));
            $req->fetch();
        } else
            $fail = "L'adresse mail est incorrecte";

    }

    if (!empty($infos['telephone'])) {
        if (isNumeroTel($infos['telephone'])) {
            $req = $bdd->prepare('UPDATE user SET telephone = :telephone WHERE id=:id_client');
            $req->execute(array(
                'telephone' => htmlspecialchars($infos['telephone']),
                'id_client' => $id_client));
            $req->fetch();
        } else
            $fail = "Numero incorect";

    }


    if (!empty($infos['mot_de_passe'])) {
        if (isMotDePasse($infos['mot_de_passe'])) {
            $req = $bdd->prepare('UPDATE user SET mot_de_passe = :mot_de_passe WHERE id=:id_client');
            $req->execute(array(
                'mot_de_passe' => md5(htmlspecialchars($infos['mot_de_passe'])),
                'id_client' => $id_client));
            $req->fetch();
        } else
            $fail = "7 caractères demandés dont un spécial";

    }
    return $fail;


}

function isEmail($email)
{
    return preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email);
    //regexp is love, regexp is life
    // 1 si tout va bien
    // 0 si ca ne va pas
    // FALSE si une erreur quelquonque survient
}

function isNumeroTel($numero)
{
    return preg_match("#^0[1-68]([-. ]?\d{2}){4}$#", $numero);
}

function isMotDePasse($pass)
{
    return preg_match("#^(?=.*?[a-z])(?=.*?[0-9A-Z!@$%^&*-]).{7,}$#", $pass);
}








/*
$rep=takeMdp($dbh,'test@test.Com');
var_dump($rep);

function connectUser(PDO $db, $email, $mot_de_passe)
>>>>>>> origin/Nico-Accueil-inscription-profil
{
    ####
// Vérification des identifiants
    $email = htmlspecialchars($email);
    $mot_de_passe = htmlspecialchars($mot_de_passe);
    $req = $db->prepare('SELECT * FROM user WHERE Mail = :email AND mot_de_passe = :mot_de_passe');
    $req->execute(array(
        'email' => $email,
        'mot_de_passe' => md5($mot_de_passe)));

    $resultat = $req->fetch();

    //echo ("BLOP");
    return ($resultat);
}

function createUser($bdd, $utilisateur)
{
    $query=$bdd->prepare('INSERT INTO client(nom, prenom, mot_de_passe, email) VALUES(:nom, :prenom, :mot_de_passe, :email)');
    $query->execute(array(
        'nom' => htmlspecialchars($utilisateur['nom']),
        'prenom' => htmlspecialchars($utilisateur['prenom']),
        'mot_de_passe' => htmlspecialchars(md5($utilisateur['mot_de_passe'])),
        'email' => htmlspecialchars($utilisateur['email'])
    ));
    $id_client = $bdd->lastInsertId();
    $query->CloseCursor();

    return ($id_client);

}
*/
