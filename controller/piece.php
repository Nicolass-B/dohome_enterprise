<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 21/05/2017
 * Time: 16:11
 */

$titre = "Mes pièces";
require_once '../Modele/init_connexion_bdd.php';
require_once '../Modele/piece.php';
require_once '../Modele/ajouts.php';

$idmaison = $_GET['maison']; //TODO MODIFIER CA EN SESSION
$piece = getPiecesfromMaison($dbh, $idmaison);


if (isset($_GET['piece'])) {
    //on passe au controleur qui gère les capteurs pour une pièce donnée
    include('../controller/capteur.php');

} else {
    // ici la piece n'est pas précisé dans le formulaire
    // on renvoie a l'accueil des pieces
    include('../Vue/mes_pieces.php');


    if (isset($_POST['envoi'])) {
        if (isset($_POST['maison'])) {
            if (isset($_POST['nom_piece'])) {
                ajoutPiece($dbh, $_POST['type'], $_POST['piece']);
                ?>
                <script>alert("<?php echo htmlspecialchars('la pièce a bien été ajoutée', ENT_QUOTES); ?>")</script>
                <?php

            }
        }
    } else {
        echo "<p>DAMN RIEN DU TOUT</p>";
    }
}