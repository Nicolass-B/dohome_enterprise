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
    <title> Mon profil </title>
</head>
<?php include("haut_de_page.php"); ?>

<body>


<section>
    <div class="information">
        <ul>
            <div class="menusec">
                <li class="enCours"><a href="../controller/mon_profil.php">Mon profil</a></li>
                <li><a href="../controller/compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>
    </div>

    <form method="POST" action="../controller/edit_profil.php">
        <div class="formulaire">
            <div class="information">
                <ul>
                    <div class="aligne">
                        <label for="newnom">Nom</label>
                        <li><input type="text" name="newnom" value="<?php echo $infoUser["Nom"]; ?>"/></li>
                        <label for="newprenom">Prénom</label>
                        <li><input type="text" name="newprenom" value="<?php echo $infoUser["Prenom"]; ?>"/></li>

                        <label for="newadresse">Adresse</label>
                        <li><input type="text" name="newadresse" value="<?php echo $infoUser["Adresse"]; ?>"/></li>
                        <label for="newdateNaissance">Date de naissance</label>
                        <li><input type="text" name="newdateNaissance"
                                   value="<?php echo $infoUser["date_naissance"]; ?>"/></li>
                        <label for="newtel">Numéro de téléphone</label>
                        <li><input type="tel" name="newtel" value="<?php echo $infoUser["telephone"]; ?>"/></li>
                    </div>
                    <div class="aligne2">
                        <label for="newmail">E-mail</label>
                        <li><input type="email" name="newmail" value="<?php echo $_SESSION['Mail']; ?> " disabled/></li>
                        <label for="entermdpactuel">Mot de passe actuel</label>
                        <li><input type="password" name="entermdpactuel" value=""/></li>
                        <label for="newmdp">Mot de passe</label>
                        <li><input type="password" name="newmdp" value=""/></li>
                        <label for="newconfirmeMdp">Confirmation Mot de passe</label>
                        <li><input type="password" name="newconfirmeMdp" value=""/></li>

                    </div>
                </ul>
                <input type="submit" name="envoiProfil" value="Modifier mon profil">


                </ul>
            </div>
        </div>

    </form>
    <?php if (isset($msg)) {
        echo $msg;
    } ?>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>