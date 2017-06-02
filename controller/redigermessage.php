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



if(isset($_POST["Titre"])&& !empty($_POST["Titre"])){
    if(isset($_POST["contenu"])&& !empty($_POST["contenu"])){
        if(isset($_POST["destinataire"])&& !empty($_POST["destinataire"])){
            echo 'POST PASS !';
            $idDestinataire = getIdFromName($dbh, $_POST['destinataire']);
            sendMessageToUser($dbh, $_SESSION['idUser'], $idDestinataire, $_POST['Titre'], $_POST['contenu']);

            ?>
            <script>alert("<?php echo htmlspecialchars('le message est envoyé !', ENT_QUOTES); ?>")</script>
            <?php
        }
    }
}