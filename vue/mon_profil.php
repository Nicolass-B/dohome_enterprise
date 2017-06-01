<?php
if (!isset($_SESSION)) {session_start();}
?>

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
                <li><a href="../vue/compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>
    </div>

<form method="POST" action="../controller/edit_profil.php">
    <p>
    <div class="formulaire">
        <div class="information">
            <ul>
                Nom
                <li><input type="text" name="newnom" value="<?php echo $infoUser["Nom"]; ?>" /></li>
                Prénom
                <li><input type="text" name="newprenom" value="<?php echo $infoUser["Prenom"]; ?>" /></li>
                E-mail
                <li><input type="email" name="newmail" value="<?php echo $_SESSION['Mail']; ?> "  disabled /></li>
                Mot de passe actuel
                <li><input type="password" name="entermdpactuel" value="" /></li>
                Mot de passe
                <li><input type="password" name="newmdp" value="" /></li>
                Confirmation Mot de passe
                <li><input type="password" name="newconfirmeMdp" value="" /></li>
                Adresse
                <li><input type="text" name="newadresse" value="<?php echo $infoUser["Adresse"]; ?>"/></li>
                Date de naissance
                <li><input type="text"  name="newdateNaissance" value="<?php echo $infoUser["date_naissance"]; ?>"/></li>
                Numéro de téléphone
                <li><input type="tel" name="newtel" value="<?php echo $infoUser["telephone"]; ?>"/></li>

                <input type="submit" name="envoiProfil" value="Modifier mon profil">


            </ul>
        </div>
    </div>

    </p>
</form>
    <?php if(isset($msg)){ echo $msg;} ?>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>