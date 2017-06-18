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

session_start();

if (isset($_POST['envoi'])) {//envoi du formulaire

    if (!empty($_POST['nom'])//vérifie si tout les champs sont bien rempli
        && !empty($_POST['prenom'])
        && !empty($_POST['E-mail'])
        && !empty($_POST['pass'])
        && !empty($_POST['confirmePasse'])
        && !empty($_POST['adresse'])
        && !empty($_POST['tel'])
        && !empty($_POST['sexe'])
        && !empty($_POST['jour'])
        && !empty($_POST['mois'])
        && !empty($_POST['année'])
    ) {

        //htmlentities améliore la sécurité(évite les injections xss)
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $mail = htmlentities($_POST['E-mail']);
        $pass = htmlentities($_POST['pass']);
        $confirmePasse = htmlentities($_POST['confirmePasse']);
        $adresse = htmlentities($_POST['adresse']);
        $tel = htmlentities($_POST['tel']);
        $sexe = htmlentities($_POST['sexe']);
        $jour = htmlentities($_POST['jour']);
        $mois = htmlentities($_POST['mois']);
        $année = htmlentities($_POST['année']);

        require('../modele/Inscription.php');

        if (verif2MDP($pass, $confirmePasse)) {
            if (verifMail($bdd, $mail) == false) {
                if (isset($_POST['memo']) && htmlentities($_POST['memo']) == 'j\'accepte') {

                    insertUser($bdd, $nom, $prenom, $pass, $tel, $mail, $adresse, $sexe, $année, $mois, $jour);
                    $error = 'Inscription réussi';
                    session_unset();
                    session_destroy();
                    include('../vue/sign_up.php');

                } else {
                    $_SESSION = $_POST;
                    $error = 'veuillez accepter les conditions d\'utilisation';
                    include('../vue/sign_up.php');
                }

            } else {
                $_SESSION = $_POST;
                $error = 'le mail est déja utilisé';
                include('../vue/sign_up.php');
            }
        } else {
            $_SESSION = $_POST;
            $error = 'mdp différent';
            include('../vue/sign_up.php');
        }
    } else {
        $_SESSION = $_POST;
        $error = 'les champs ne sont pas tous rempli';
        include('../vue/sign_up.php');
    }

} else {
    $_SESSION = $_POST;
    $error = 'formulaire non envoyé';
    include('../vue/sign_up.php');
}






/*    $titre="inscription";
    require_once("views/sign_up.php");

    if (isset($_POST['email']))
    {

        $fail=NULL;
        if (!isEmail($_POST['email']))
        {
            $fail = 'Email incorrect';
        }
        else if (emailExistant($bdd, $_POST['email']))
        {
            $fail='Email déjà utilisé';
        }
        else if (!isMotDePasse($_POST['mot_de_passe']))
        {
            $fail='7 caractères demandés dont un spécial pour le mot de passe';
        }
        else if ($_POST['mot_de_passe'] != $_POST['mot_de_passe_bis'])
        {
            $fail='Mots de passe différents';
        }
        else if (isAdmin($bdd, $_POST['numero_identification']))
        {
            $fail="isAdmin";
        }
        else if (appareilStatut($bdd, $_POST['numero_identification']) == 1)
        {
            $fail="L'appareil est déjà utilisé";
        }
        else if (appareilStatut($bdd, $_POST['numero_identification']) == 2)
        {
            $fail="L'appareil n'existe pas";
        }


        if ($fail=="isAdmin")
        {

            $_SESSION['id_client'] = createUserFirstConnexion($bdd, $_POST, 1);
            $_SESSION['admin'] = 1;
            ?>

            <script type="text/javascript">
                setTimeout("document.location='index.php'; " , 20);
            </script>

            <?php
        }
        else if (!isset($fail))
        {

            $_SESSION['id_client'] = createUserFirstConnexion($bdd, $_POST);
            $_SESSION['admin'] = 0;
            $infoDomicile['numero'] = NULL;
            $infoDomicile['rue'] = NULL;
            $infoDomicile['departement'] = NULL;
            $infoDomicile['ville'] = NULL;
            $infoDomicile['pays'] = NULL;

            $numero_identification = $_POST['numero_identification'];

            $infoSalle['nom'] = 'Nouvelle salle';
            $infoSalle['nombre_fenetre'] = 1;
            $infoSalle['taille']=1;

            appairerAppareil($bdd, ajoutSalle($bdd, ajoutDomicile($bdd, $_SESSION['id_client'], $infoDomicile), $infoSalle), $numero_identification);
            ?>
            <script type="text/javascript">
                setTimeout("document.location='index.php'; " , 20);
            </script>
            <?php

        }
        else
            echo (inscriptionForm($fail));

    }
    else
        echo (inscriptionForm());
*/