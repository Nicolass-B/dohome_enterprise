<?php
if (!isset($_SESSION)) {session_start();}

$titre = "Mes Maisons";

require_once '../modele/init_connexion_bdd.php';
require_once '../modele/ajouts.php';
require_once '../modele/maison.php';


$iduser = $_SESSION['id_user'];



if (isset($_GET['maison'])) {

    header('Location : ../controller/piece.php?maison='. $_GET['maison']);

} else {
    // ici la piece n'est pas précisé dans le formulaire
    // Affiche toutes les maisons du compte user
    if (isset($_POST['envoi']) && !empty($_POST['envoi'])) {
        if (isset($_POST['nom']) && !empty($_POST['nom'])) {
            if(isset($_POST['superficie']) && !empty($_POST['superficie'])) {

                ajoutMaison($bdd, $_POST['nom'], $_SESSION['id_user'], $_POST['superficie']);
                ?>
                <script>alert("<?php echo htmlentities('la maison a bien été ajoutée'), ENT_QUOTES; ?>")</script>
                <?php
            }
        }
    }
    else {
        if(isset($_GET['suppr']) && !empty($_GET['suppr'])) {
            suppressionMaison($bdd,$_SESSION['id_user'], $_GET['suppr']);
            ?>
            <script>alert("<?php echo htmlentities('la maison a bien été supprimée'), ENT_QUOTES; ?>")</script>
            <?php
        }
    }
    $maison = getMaisons($bdd, $iduser);
    include('../vue/mes_maisons.php');
}