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
        include_once ('../modele/utilisateurs.php');
        include_once ('../modele/utilisateurs_secondaire.php');

        $loginMail=htmlentities($_POST['loginMail']);
        $passEnter=htmlentities($_POST['pass']);
        $passcryptEnter = sha1($passEnter);

        //partie client et admin
        if(verifUtilisateurs($bdd,$loginMail)){//utilisateur ou admin trouvé dans la base de donnée

            if(isAdmin($bdd,$loginMail)){//test si l'utilisateur est un admin
                $repMdpadmin= takeMdp($bdd,$loginMail);
               // var_dump($repMdpadmin);
               // var_dump($passcryptEnter);
                if($passcryptEnter==$repMdpadmin){//mot de passe trouvé dans la base de donnée, connexion admin
                    session_start();
                    $_SESSION['id_user']=takeIdUser($bdd,$loginMail);
                    include('../vue/dashboard_backoffice.php');
                }
                else{
                    $messageErreur=  'Login ou mot de passe incorrect';
                    include ('../vue/home.php');
                }

            }
            else{
                $repMdpclient= takeMdp($bdd,$loginMail);
                if($passcryptEnter==$repMdpclient){//mot de passe trouvé dans la base de donnée, connexion client
                    session_start();
                    $_SESSION['Mail']=$loginMail;
                    $_SESSION['id_user']=takeIdUser($bdd,$loginMail);
                    include('../vue/dashboard.php');
                }
                else{
                $messageErreur=  'Login ou mot de passe incorrect';
                include ('../vue/home.php');
                }
            }
        }

        //partie client secondaire
        elseif (verifmailSecondaryUser($bdd,$loginMail)){//compte secondaire trouvé dans la bdd
            $repMdpSecondaryUser=takemdpSecondaryUser($bdd,$loginMail);

            if($passcryptEnter==$repMdpSecondaryUser){//mot de passe trouvé dans la base de donnée, connexion client secondaire
                session_start();

                $mail_id_user=getMailComptePrincipal($bdd,$loginMail);

                $_SESSION['Mail']=$mail_id_user['Mail'];
                $_SESSION['niveau_securite']=getnivSecurit($bdd,$loginMail);
                $_SESSION['id_user']=$mail_id_user['id_user'];
                include('../vue/dashboard.php');
            }
            else{
                $messageErreur=  'Login ou mot de passe incorrect ';
                include ('../vue/home.php');
            }
        }

        else{
            $messageErreur= 'Login ou mot de passe incorrect';
            include ('../vue/home.php');
        }
    }
    else{
        $messageErreur=  'Tout les champs ne sont pas remplis';
        include ('../vue/home.php');
    }
}
else{
    //$messageErreur= 'Formulaire pas validé';
    include ('../vue/home.php');
}



