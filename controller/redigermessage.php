<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 29/05/2017
 * Time: 11:39
 */
$titre = 'Rédiger un message';

include('../vue/redigermessage.php');
include_once '../modele/messagerie.php';


if (isset($_POST["Titre"]) && !empty($_POST["Titre"])) {
    if (isset($_POST["contenu"]) && !empty($_POST["contenu"])) {
        if (isset($_POST["destinataire"]) && !empty($_POST["destinataire"])) {
            echo 'POST PASS !';

            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                $secret = '6Ldd3iMUAAAAAHivcpzKVjz-HRtZcdmWwv8iFCIF';
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);

                if ($responseData->success) {
                    // if recaptcha check was success

                    $idDestinataire = getIdFromName($dbh, $_POST['destinataire']);
                    sendMessageToUser($dbh, $_SESSION['idUser'], $idDestinataire, $_POST['Titre'], $_POST['contenu']);

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
        }

    }
}

