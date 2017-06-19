<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 17/06/2017
 * Time: 14:36
 */

include('../modele/init_connexion_bdd.php');
$mailEnter = 0;
if (isset($_GET['mail'])) {
    $mailEnter = $_GET['mail'];
}


$reponse = $bdd->query('SELECT COUNT(mail) AS nb_ocu FROM user WHERE Mail=\'' . $mailEnter . '\' AND is_admin=0');
$affiche = $reponse->fetch();

if ($affiche['nb_ocu'] == 1 || isset($msg)) {
    $reponse2 = $bdd->query('SELECT question_secrete FROM user WHERE Mail= \'' . $mailEnter . '\' ');
    $affiche2 = $reponse2->fetch();
    ?>
    </br>
    <label>Votre question secrête est :</label>
    <br>
    <label>"<?php echo $affiche2['question_secrete'] ?>"</label>
    <br><br>

    <form method="post" action="../controller/traitement_mdp_oubli.php">
        <label for="repSecret">Entrer votre réponse secrête</label>
        <br>
        <input type="text" name="repSecret" id="repSecret" placeholder="Réponse secrête" value="" required/>
        <br><br>

        <label for="newpass">Nouveau mot de passe</label>
        <br>
        <input type="password" name="newpass" id="newpass" placeholder="Entrez votre nouveau mdp" value=""
               required/>
        <br>
    </br>
        <label for="newpassconfirm">Confirmation de mot de passe</label>
        <br>
        <input type="password" name="newpassconfirm" id="newpassconfirm"
               placeholder="Confirmez votre mdp" value="" required/>
        <br><br>
        <input type="hidden" name="mail" value="<?php echo $mailEnter ?>">

        <input type="submit" name="envoi" value="Changez votre mot de passe" required/>
        <?php if (isset($msg)) {
            echo '<span style="color:red">' . $msg . '</span>';
        } ?>
    </form>
    <?php
} else {
    echo '<p>le mail n\'existe pas</p>';
}

?>