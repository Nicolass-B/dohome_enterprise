<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_home.css"/>
    <title>Accueil DoHome enterprise ™</title>
</head>
<body>


<header>
    <section1>
        <div class="container">
            <img class="logo" src="../Vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
            <nav>
                <ul>
                    <div class="menu">
                        <li><a href="">FR</a></li>
                        <li><a href="">EN</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </section1>

</header>
<body>


<div class="corpPage">
    <div class="textIntro">
        <img class="presentation" src="../Vue/img/presentation.png" alt="presentation"/>
    </div>

    <div class="connexion-inscription">
        <form method="POST" action="../controller/traitementConnexion.php">

            <input type="text" name="loginMail" " placeholder="Login" required/>
            <input type="password" name="pass" placeholder="Mot de passe" required/>
            <input type="submit" name="envoi" value="Se connecter"/>

            </br></br>
            <input type="checkbox" name="memo" id="memo"/>
            <label for="memo">Se souvenir de moi</label>
            <p>
                <a id="t" href="../Vue/signUp.php">S'inscrire</a>
                <a id="t" href="">Mdp oublié ?</a>
            </p>

        </form>
        <div class="styleMessageErreur">
            <?php if (isset($messageErreur)) {
                echo $messageErreur;
            } ?>
        </div>
    </div>
</div>


</body>
<?php include("bas_de_page.php"); ?>

</html>