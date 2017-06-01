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
            <img class="logo" src="../vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
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
    </br><div class="centre2">Bienvenue sur DoHome Enterprise™</div></br>
    <div class="connexion-inscription">
        <form method="POST" action="../controller/traitement_connexion.php">

            <input type="text" name="loginMail" placeholder="Login" required/>
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

    <aside class="defilement" style="background-image: url('../vue/img/fond.jpg');">
        <section>
            <div class="element">
                <img src="../vue/img/one.png" class="photo">
                <div class="texte">DoHome Enterprise ™ vous propose </br> une solution domotique innovante </br>et intelligente</div>
            </div>
            <div class="element">
                <img src="../vue/img/two.png" class="photo">
                <div class="texte">Gérez votre consommation </br> énergétique et faites </br>des bénéfices !</div>
            </div>
        </section>
        <section>
            <div class="element">
                <img src="../vue/img/three.png" class="photo">
                <div class="texte">Contrôlez votre maison </br>où que vous soyez sur votre smartphone </br>ou votre ordinateur</div>
            </div>
            <div class="element">
                <img src="../vue/img/four.png" class="photo">
                <div class="texte">Toutes vos données sont </br>sécurisées et sont anonymes</div>
            </div>
        </section>
    </aside>





    <div class="contact" >
        <div class="contact_bis">
            <div class="centre2">
                Contact
            </div>
            <div class="conteneur">
                <div class="element">
                    <img src="../vue/img/localisation.png" class="icone">
                    <div class="contact_txt">28 Rue Notre Dame des Champs</br>Paris 75006</div>
                </div>
                <div class="element">
                    <img src="../vue/img/mail.png" class="icone">
                    <div class="contact_txt">admin@dohome.com</div>
                </div>
                <div class="element">
                    <img src="../vue/img/telephone.png" class="icone">
                    <div class="contact_txt">06 XX XX XX XX</div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<?php include("bas_de_page.php"); ?>

</html>