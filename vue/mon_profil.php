<?php
if (!isset($_SESSION)) {session_start();}
var_dump($infoUser);
?>

//si modif mail ==> délogue

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

<form method="POST" action="../controller/edit_profil.php">
    <p>
    <div class="formulaire">
        <div class="information">
            <ul>
                Nom
                <li><input type="text" name="nom" value="<?php echo $infoUser['Nom']; ?>" /></li>
                Prénom
                <li><input type="text" name="prenom" value="Prénom" /></li>
                E-mail
                <li><input type="text" name="mail" value="Adresse mail"/></li>
                Mot de passe
                <li><input type="text" name="mdp" value="" /></li>
                Adresse
                <li><input type="text" name="adresse" value="Adresse"/></li>
                Date de naissance
                <li><input type="date"  name="dateNaissance" value="JJ/MM/AAAA"/></li>
                Numéro de téléphone
                <li><input type="text" name="tel" value="Numéro"/></li>

                <input type="submit" name="envoiProfil">


            </ul>
        </div>
    </div>

    </p>
</form>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>