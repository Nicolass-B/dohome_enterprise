<?php

$titre = "capteur";


require_once '../Modele/initConnexionBDD.php';
require_once '../Modele/capteur.php';
require_once '../Modele/ajouts.php';
require_once '../Modele/piece.php';

if (isset($_GET['capteur']))
{
    $Capteur = new Capteur($_GET['capteur'], $dbh);
    $titre = $Capteur->typecapteur[0];
    include('../Vue/mescapteurs.php');

} else {
    // ici le capteur n'est pas précisé dans le formulaire
    // on renvoie tous les capteurs de la pièce séléctionnée
    $idmaison = 1; //$_SESSION['idmaison']; to add quand on aura les sessions
    $idpiece = $_GET['piece'];
    //TODO ajouter les sessions et remplacer ici.
    $pieces = getPiecesfromMaison($dbh, $idmaison);
    $capteur_piece = getCapteursfromPiece($dbh, $idpiece);
    include('../Vue/capteur.php');



    if (isset($_POST['envoi'])) {
        if (isset($_POST['type'])) {
            if (isset($_POST['piece'])) {
                if (isset($_POST['nom_capteur'])) {
                    ajoutCapteur($dbh, $_POST['type'], $_POST['piece']);
                    ?>
                    <script>alert("<?php echo htmlspecialchars('Un capteur vient d\'être ajouté', ENT_QUOTES); ?>")</script>
                    <?php

                }
            }
        }
        echo "<p>DAMN, tu viens d'ajouter un capteur dans la pièce !</p>";
    } else{
        echo 'pas de POST';
    }
}
