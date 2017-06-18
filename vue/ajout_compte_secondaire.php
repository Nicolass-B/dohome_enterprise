<?php if (!isset($_SESSION)) {session_start();} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_sign_up.css"/>
    <title>Inscription</title>
</head>

<?php include("haut_de_page.php"); ?>

<body>
    <section>
        <div class="information">
            <form method="post" action="../controller/compte_secondaire.php">
                <fieldset>
                    <legend>Ajouter un compte secondaire</legend>
                    <div class="test">
                        <div class="test1">
                            <p>
                                <label for="nomUserSec">Nom </br></label>
                                <input type="text" name="nomUserSec" id="nomUserSec" placeholder="Entrez votre nom"  required/>
                            </p>
                            <label for="prenomUserSec">Prénom </br></label>
                            <input type="text" name="prenomUserSec" id="prenomUserSec" placeholder="Entrez votre prénom" required/>
                            <br><br>
                            <label for="E-mailUserSec">E-mail </br></label>
                            <input type="email" name="E-mailUserSec" id="E-mailUserSec" placeholder="Entrez votre adresse mail" required/>
                            <br><br>
                            <label for="passUserSec">Mot de passe </br></label>
                            <input type="password" name="passUserSec" id="passUserSec" placeholder="Entrez votre mot de passe" required/>
                            <br><br>
                            <label for="confirmePasseUserSec">Confirmation du mot de passe </br></label>
                            <input type="password" name="confirmePasseUserSec" id="confirmePasseUserSec" placeholder="Confirmation mot de passe" required/>
                            <br><br>
                            <?php
                            if(isset($msg)){
                                echo $msg;
                            } ?>
                            <br><br>
                            <input class="bouton1" type="submit" name="formulaireAjoutSec" value="ajouter mon compte secondaire" />
                            <p>
                                <a class="bouton1" href="compte_secondaire.php">Retour</a>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </section>

</body>

<?php include("bas_de_page.php"); ?>

</html>