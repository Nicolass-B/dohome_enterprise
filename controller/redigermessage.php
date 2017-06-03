<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 29/05/2017
 * Time: 11:39
 */
if (!isset($_SESSION)) {session_start();}
$titre = 'Rédiger un message';

include('../vue/redigermessage.php');
include_once '../modele/messagerie.php';



if(isset($_POST["Titre"])&& !empty($_POST["Titre"])){
    if(isset($_POST["contenu"])&& !empty($_POST["contenu"])){
        if(isset($_POST["destinataire"])&& !empty($_POST["destinataire"])){
            echo 'POST PASS !';
            sendMessageToUser($bdd, $_SESSION['idUser'], $_POST['destinataire'], $_POST['Titre'], $_POST['contenu']);

            ?>
            <script>alert("<?php echo htmlspecialchars('le message est parti !', ENT_QUOTES); ?>")</script>
            <?php
        }
    }
}