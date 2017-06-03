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
                <li><a href="../controller/mon_profil.php">Mon profil</a></li>
                <li class="enCours"><a href="../controller/compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>
        <p>
            <div class="placement">
                <div class="imagepp">
                    <img src="../vue/img/pp%20compte%20sec.png" alt="Photo de profil"/>
                </div>

        <p>P + NOM</p>

        <div class="boutton">

            <div class="bouton1">
                <input type="button" value="Modifier les accès du compte secondaire" href="lien" id="bouton1"/>
            </div>
            <div class="bouton2">
                <input type="button" value="Supprimer le compte secondaire" href="lien" id="bouton2"/>
            </div>

        </div>
    </div>
    </p>

    <p>
        <div class="placement">
                <div class="imagepp">
                    <img src="../vue/img/pp%20compte%20sec.png" alt="Photo de profil"/>
                </div>
            <p>
                P + NOM
            </p>

            <div class="boutton">

                <div class="bouton1">
                    <input type="button" value="Modifier les accès du compte secondaire" href="lien" id="bouton1"/>
                </div>
                <div class="bouton2">
                    <input type="button" value="Supprimer le compte secondaire" href="lien" id="bouton2"/>
                </div>
            </div>
        </div>
    </p>

    <p>
        <div class="placement">
            <div class="imagepp">
                <img src="../vue/img/pp%20compte%20sec.png" alt="Photo de profil"/>
            </div>
    <p>P + NOM</p>

    <div class="boutton">
        <div class="bouton1">
            <input type="button" value="Modifier les accès du compte secondaire" href="lien" id="bouton1"/>
        </div>
        <div class="bouton2">
            <input type="button" value="Supprimer le compte secondaire" href="lien" id="bouton2"/>
        </div>
    </div>
    </div>
    </p>

    <div class="bouton3">
        <input type="button" value="Ajouter un compte secondaire" href="lien" id="bouton3"/>
    </div>
    </div>
</section>

</body>
<?php include("bas_de_page.php"); ?>

</html>