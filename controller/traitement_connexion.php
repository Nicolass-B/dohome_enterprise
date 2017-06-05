<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 12/05/2017
 * Time: 02:34
 */
/* la fonction isset() permet de vérifier si une variable est définie
la fonction empty Détermine si une variable est considérée comme vide.
Une variable est considérée comme vide si elle n'existe pas, ou si sa valeur équivaut à FALSE
 */


if(isset($_POST['envoi'])) { // L'utilisateur vient de valider le formulaire de connexion
    if(!empty($_POST['loginMail']) && !empty($_POST['pass'])) { // L'utilisateur a rempli tous les champs du formulaire
        include ('../modele/utilisateurs.php');
        include ('../modele/inscription.php');

        $loginMail=htmlentities($_POST['loginMail']);
        $pass=htmlentities($_POST['pass']);

        $repUtilisateur=takeUtilisateurs($bdd,$loginMail);
        if($repUtilisateur['nb_ocu']==0){//utilisateur non trouvé dans la base de donnée
            $messageErreur=  'Login ou mot de passe incorrect';
            include ('../Vue/home.php');
        }

        else{// utilisateur trouvé
            $repMdp=takeMdp($bdd,$loginMail);
            if($_POST['pass']!=$repMdp['mot_de_passe']){//mot de passe non trouvé dans la base de donnée
                $messageErreur= 'Login ou mot de passe incorrect';
                include ('../Vue/home.php');
            }
            elseif (isAdmin($bdd,$loginMail) && $repUtilisateur['nb_ocu']==1){
                include('../Vue/dashboard_backoffice.php');
            }

            else{//mdp OK
                session_start();
                $_SESSION['Mail']=$loginMail;
                $idUser=takeIdUser($bdd,$loginMail);
                $_SESSION['id_user']=$idUser['id'];
              include('../Vue/dashboard.php');
            }
        }
    }
    else{
        $messageErreur=  'Tout les champs ne sont pas remplis';
        include ('../Vue/home.php');
    }
}
else{
    $messageErreur= 'Formulaire pas validé';
    include ('../Vue/home.php');
}



