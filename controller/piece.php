<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 21/05/2017
 * Time: 16:11
 */
if (!isset($_SESSION)) {
    session_start();
}
$titre = "Mes pièces";
require_once '../modele/init_connexion_bdd.php';
require_once '../modele/piece.php';
require_once '../modele/ajouts.php';

$idmaison = $_GET['maison']; //TODO MODIFIER CA EN SESSION
$nomMaison=$_GET['nom'];

if (isset($_GET['piece'])) {
    //on passe au controleur qui gère les capteurs pour une pièce donnée
    //include('../controller/capteur.php');
    header('Location : capteur.php?piece='. $_GET['piece'] );

} else {
    // ici la piece n'est pas précisé dans le formulaire
    // on renvoie a l'accueil des pieces

    if (isset($_POST['envoi']) && !empty($_POST['envoi'])) {
        if (isset($_POST['superficie']) && !empty($_POST['superficie'])) {
            if (isset($_POST['nom_piece']) && !empty($_POST['nom_piece'])) {
                ajoutPiece($bdd, $_POST['nom_piece'], $idmaison, $_POST['superficie']);
                ?>
                <script>alert("<?php echo htmlspecialchars('la pièce a bien été ajoutée', ENT_QUOTES); ?>")</script>
                <?php

            }
        }
    } elseif (isset($_GET['suppr']) && !empty($_GET['suppr'])) {
        suppressionPiece($bdd, $_GET['suppr']);
        ?>
        <script>alert("<?php echo 'la pièce a bien été supprimée', ENT_QUOTES ?>")</script>
        <?php
    }
    $piece = getPiecesfromMaison($bdd, $idmaison);
    include('../vue/mes_pieces.php');
}