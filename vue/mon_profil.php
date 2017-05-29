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
                <label>Nom</label>
                <li><input type="text" name="pseudo" value="Nom"/></li>
                <label>Prénom</label>
                <li><input type="text" name="pseudo" value="Prénom"/></li>
                <label>E-mail</label>
                <li><input type="text" name="pseudo" value="Adresse mail" disabled="disabled"/></li>
                <label>Mot de passe</label>
                <li><input type="text" name="pseudo" value="********" disabled="disabled"/></li>
                <label>Adresse</label>
                <li><input type="text" name="pseudo" value="Adresse"/></li>
                <label>Date de naissance</label>
                <li><input type="date" value="JJ/MM/AAAA"/></li>
                <label>Numéro de téléphone</label>
                <li><input type="text" name="pseudo" value="Numéro"/></li>


            </ul>
        </div>
    </div>

    </p>
    <div class="bouton3">
        <input type="button" value="Enregistrer mes données" href="lien" id="bouton3"/>
    </div>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>