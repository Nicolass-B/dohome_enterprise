<?php
if (!isset($_SESSION)) {session_start();}

$titre = "Mes Maisons";


require_once '../modele/ajouts.php';
require_once '../modele/maison.php';
require_once '../modele/init_connexion_bdd.php';

$iduser = $_SESSION['id_user'];
var_dump($iduser);
$maison = getMaisons($bdd, $iduser);


if (isset($_GET['maison'])) {

    include('../controller/piece.php');

} else {
    // ici la piece n'est pas précisé dans le formulaire
    // Affiche toutes les maisons du compte user
    include('../vue/mes_maisons.php');


    if (isset($_POST['envoi'])) {
        if (isset($_POST['nom_maison'])) {

            ajoutMaison($bdd, $_POST['nom_maison'], $_POST['piece']);
            ?>
            <script>alert("<?php echo htmlspecialchars('la maison a bien été ajoutée', ENT_QUOTES); ?>")</script>
            <?php

        }
    } else {
        echo "<p>DAMN, tu viens d'ajouter un capteur dans la pièce !</p>";
    }
}