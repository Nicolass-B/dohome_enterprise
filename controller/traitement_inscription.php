<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 09/05/2017
 * Time: 10:01
 */

/*
 *étape 1 verif envoi formulaire
 *étape 2 verif des champs
 *étape 3 verif mdp et mdp confirmation
 *étape 4 vérif dans bdd si le mail est bien unique
 *étape 5 insert les données du formulaire dans la BDD
 *
 * */



if(isset($_POST['envoi'])){//envoi du formulaire

    if(!empty($_POST['nom'])//vérifie si tout les champs sont bien rempli
        &&!empty($_POST['prenom'])
        &&!empty($_POST['E-mail'])
        &&!empty($_POST['pass'])
        &&!empty($_POST['confirmePasse'])
        &&!empty($_POST['adresse'])
        &&!empty($_POST['tel'])
        &&!empty($_POST['sexe'])
        &&!empty($_POST['jour'])
        &&!empty($_POST['mois'])
        &&!empty($_POST['année'])
        &&!empty($_POST['questionSecrete'])
        &&!empty($_POST['repSecrete'])) {

        //htmlentities améliore la sécurité(évite les injections xss)
        $nom=htmlentities($_POST['nom']);
        $prenom=htmlentities($_POST['prenom']);
        $mail=htmlentities($_POST['E-mail']);
        $pass=htmlentities($_POST['pass']);
        $confirmePasse=htmlentities($_POST['confirmePasse']);
        $adresse=htmlentities($_POST['adresse']);
        $tel=htmlentities($_POST['tel']);
        $sexe = htmlentities($_POST['sexe']);
        $jour = htmlentities($_POST['jour']);
        $mois = htmlentities($_POST['mois']);
        $annee = htmlentities($_POST['année']);
        $questionSecrete=htmlentities($_POST['questionSecrete']);
        $repQuestionSecrete=htmlentities($_POST['repSecrete']);

        require ('../modele/inscription.php');

        if(verif2MDP($pass,$confirmePasse)){
            $passcrypt = sha1($pass);
            if(verifMail($bdd,$mail)==false){
                if(isset($_POST['memo']) && htmlentities($_POST['memo'])=="j'accepte"){
                   // insertUser($bdd,$nom,$prenom,$passcrypt,$tel,$mail,$adresse,$sexe,$annee,$mois,$jour,$questionSecrete,$repQuestionSecrete);
                    $error= 'good';
                    session_unset();
                    session_destroy();
                    include('../vue/sign_up.php');
                }
                else{
                    $_SESSION=$_POST;
                    $error= 'veuillez accepter les conditions d\'utilisation';
                    include('../vue/sign_up.php');
                }

            }

            else {
                $_SESSION=$_POST;
                $error= 'le mail est déja utilisé';
                include('../vue/sign_up.php');
            }
        }
        else{
            $_SESSION=$_POST;
            $error= 'mdp différent';
            include('../vue/sign_up.php');
        }
    }
    else {
        $_SESSION=$_POST;
        $error= 'les champs ne sont pas tous rempli';
        include('../vue/sign_up.php');
    }

}
else{
    $_SESSION=$_POST;
    $error= 'formulaire non envoyé';
    include('../vue/sign_up.php');
}


