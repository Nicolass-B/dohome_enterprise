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


if (isset($_POST['envoi'])) { // L'utilisateur vient de valider le formulaire de connexion

    if (!empty($_POST['loginMail']) && !empty($_POST['pass'])) { // L'utilisateur a rempli tous les champs du formulaire
        include('../modele/utilisateurs.php');
        include('../modele/inscription.php');

        $loginMail = htmlentities($_POST['loginMail']);
        $pass = htmlentities($_POST['pass']);

        $repUtilisateur = takeUtilisateurs($bdd, $loginMail);
        if ($repUtilisateur['nb_ocu'] == 0) {//utilisateur non trouvé dans la base de donnée
            $messageErreur = 'Login ou mot de passe incorrect';
            include('../vue/home.php');
        } else {// utilisateur trouvé
            $repMdp = takeMdp($bdd, $loginMail);
            //var_dump($repMdp);
            if ($_POST['pass'] != $repMdp['mot_de_passe']) {//mot de passe non trouvé dans la base de donnée
                $messageErreur = 'Login ou mot de passe incorrect';
                include('../vue/home.php');
            } elseif (isAdmin($bdd, $loginMail) && $repUtilisateur['nb_ocu'] == 1) {
                include('../vue/dashboard_backoffice.php');
            } else {//mdp OK
                if (isset($_POST['memo']) && !empty($_POST['memo'])) {
                    setcookie('email', $loginMail, time() * 365 * 24 * 3600, '/', null, false, true);
                    setcookie('password', $pass, time() * 365 * 24 * 3600, '/', null, false, true);
                }
                session_start();
                $_SESSION['Mail'] = $loginMail;
                $idUser = takeIdUser($bdd, $loginMail);
                $_SESSION['id_user'] = $idUser['id_user'];
                include('../Vue/dashboard.php');
            }
        }
    } else {
        $messageErreur = 'Tout les champs ne sont pas remplis';
        include('../vue/home.php');
    }
} else {
    $messageErreur = 'Formulaire pas validé';
    include('../vue/home.php');
}



