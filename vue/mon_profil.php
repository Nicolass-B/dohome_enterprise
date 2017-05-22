<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>
    <title> Mon profil </title>
</head>
<?php include("haut_de_page.php"); ?>

<body>


<section>
    <div class="information">
        <ul>
            <div class="menusec">
                <li class="enCours"><a href="mon_profil.php">Mon profil</a></li>
                <li><a href="compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>
    </div>
    <p>
    <div class="formulaire">
        <div class="information">
            <ul>
                Nom
                <li><input type="text" name="pseudo" value="Nom" disabled="disabled"/></li>
                Prénom
                <li><input type="text" name="pseudo" value="Prénom" disabled="disabled"/></li>
                E-mail
                <li><input type="text" name="pseudo" value="Adresse mail"/></li>
                Mot de passe
                <li><input type="text" name="pseudo" value="********" disabled="disabled"/></li>
                Adresse
                <li><input type="text" name="pseudo" value="Adresse"/></li>
                Date de naissance
                <li><input type="date" value="JJ/MM/AAAA"/></li>
                Numéro de téléphone
                <li><input type="text" name="pseudo" value="Numéro"/></li>


            </ul>
        </div>
    </div>

    </p>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>