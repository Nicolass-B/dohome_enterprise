<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 29/05/2017
 * Time: 11:39
 */
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_user'])) {
    $_SESSION['id'];
    //TODO : Redirect if not logged in
    ?>
    <script>window.location.replace("../index.php");</script>
    <?php
}

$titre = 'Rédiger un message';


include_once '../modele/messagerie.php';


if (isset($_POST['envoi']) && !empty($_POST['envoi'])) {
    if (isset($_POST["Titre"]) && !empty($_POST["Titre"])) {
        if (isset($_POST["contenu"]) && !empty($_POST["contenu"])) {
            if (isset($_POST["destinataire"]) && !empty($_POST["destinataire"])) {
                if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                    $secret = '6Ldd3iMUAAAAAHivcpzKVjz-HRtZcdmWwv8iFCIF';
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);

                    if ($responseData->success) {
                        // if recaptcha check was success
                        $idDestinataire = getIdFromMail($bdd, htmlspecialchars($_POST['destinataire']));
                        sendMessageToUser($bdd, $_SESSION['id_user'], $idDestinataire['id'], htmlspecialchars($_POST['Titre']), htmlspecialchars($_POST['contenu']));

                        ?>
                        <script>alert("<?php echo htmlspecialchars('le message est envoyé !', ENT_QUOTES); ?>")</script>
                        <?php
                        //$succMsg = 'Your contact request have submitted successfully.';
                        //exit($succMsg);
                    } else {
                        // if not show the error
                        $errMsg = 'Robot verification failed, please try again.';
                        echo $errMsg;

                    }

                } else {
                    // if recaptcha is not checked
                    ?>
                    <script>alert("<?php echo htmlspecialchars('cochez le je ne suis pas un robot', ENT_QUOTES); ?>")</script>
                    <?php
                    $errMsg = 'Please click on the reCAPTCHA box.';

                }
            } else {
                ?>
                <script>alert("<?php echo htmlspecialchars('Il manque un destinataire', ENT_QUOTES); ?>")</script>
                <?php
            }
        } else {
            ?>
            <script>alert("<?php echo htmlspecialchars('Votre contenu est vide ...', ENT_QUOTES); ?>")</script>
            <?php

        }
    } else {
        ?>
        <script>alert("<?php echo htmlspecialchars('ajoutez un titre', ENT_QUOTES); ?>")</script>
        <?php
    }
}

include('../vue/redigermessage.php');
