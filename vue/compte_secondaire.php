<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>
    <title> Mes comptes secondaires </title>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<section>
    <div class="information">
        <ul>
            <div class="menusec">
                <li><a href="mon_profil.php">Mon profil</a></li>
                <li class="enCours"><a href="../controller/compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>

        <?php foreach ($infoUserSec as list($nom, $prenom, $id_sec)) { ?>
            <div class="placement">
                <div class="imagepp">
                    <img src="../vue/img/pp%20compte%20sec.png" alt="Photo de profil"/>
                </div>

                <p><?php echo $prenom . ' ' . $nom ?></p>

                <div class="boutton">
                    <form class="boutonDroit" method="post" action="../controller/compte_secondaire.php">
                        <?php $envoiIdSec = $id_sec; ?>
                        <div class="bouton1">
                            <input type="submit" name="modif" value="Modifier les accès du compte secondaire"
                                   id="bouton1"/>
                        </div>
                        <div class="bouton2">

                            <input type="hidden" name="id_secondaire" value="<?php echo $envoiIdSec; ?>"/>
                            <input type="submit" name="supUserSec" value="Supprimer le compte secondaire" id="bouton2"/>
                        </div>
                    </form>
                </div>
            </div>

        <?php } ?>

        <div class="bouton3">
            <form method="post" action="../controller/compte_secondaire.php">
                <input type="submit" name="ajoutUserSec" value="Ajouter un compte secondaire" id="bouton3"/>
            </form>
        </div>
    </div>
</section>

</body>
<?php include("bas_de_page.php"); ?>

</html>