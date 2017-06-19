<?php
include('../modele/init_connexion_bdd.php');

if (isset($_POST['envoi'])) {
    if (!empty($_POST['repSecret']) && !empty($_POST['newpass']) && !empty($_POST['newpassconfirm'])) {
        $reponse3 = $bdd->query('SELECT rep_secrete FROM user WHERE Mail= \'' . $_POST['mail'] . '\' ');
        $affiche3 = $reponse3->fetch();
        if ($affiche3['rep_secrete'] == htmlentities($_POST['repSecret'])) {
            if (htmlentities($_POST['newpass']) == htmlentities($_POST['newpassconfirm'])) {
                $passcrypt = sha1($_POST['newpass']);
                $reponse3 = $bdd->query('UPDATE user SET mot_de_passe="' . $passcrypt . '" WHERE Mail= \'' . $_POST['mail'] . '\' ');
                $msg = 'c\'est good';
                include('../controller/affiche_question_secrete.php');
            } else {
                $mail = $_POST['mail'];
                $msg = 'les deux mot de passe sont différents';
                include('../vue/mdp_oublie.php');
            }
        } else {
            $mail = $_POST['mail'];
            $msg = 'Réponse secrête invalide';
            include('../vue/mdp_oublie.php');
        }
    } else {
        $mail = $_POST['mail'];
        $msg = 'Remplir tous les champs';
        include('../vue/mdp_oublie.php');
    }
}
?>