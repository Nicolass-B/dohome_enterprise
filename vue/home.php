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

        L'approche sociale dans notre pays encourage la diversité
        et la sensibilité d'un mouvement cheminant vers plus d'unité.
        En effet, c'est en toute prescience que je peux garantir
        présentement que la sécurité des personnes confirme
        l'inaliénable volonté d'un temps et d'une époque en phase
        avec les innovations afin de ne pas être dépassé.
        Beaucoup de nos concitoyens n’ont pas encore fait leur
        choix et pensent que la tradition attachée à notre mémoire
        consubstantielle justifie les subventions publiques d'un
        déploiement visionnaire revivifiant. De plus, vous
        connaissez certainement la situation qui mène à dire que
        la dynamique vertueuse doit correspondre aux directives
        indispensables préalablement établies afin de poursuivre
        l'effort plus que légitime d'une majorité parlementaire
        qui responsabiliserait sur l'urgence écologique.

    </div>

    <div class="connexion-inscription">
        <form method="POST" action="../controller/traitement_connexion.php">

            <input type="text" name="loginMail" " placeholder="Login" required/>
            <input type="password" name="pass" placeholder="Mot de passe" required/>
            <input type="submit" name="envoi" value="Se connecter"/>

            </br></br>
            <input type="checkbox" name="memo" id="memo"/>
            <label for="memo">Se souvenir de moi</label>
            <p>
                <a id="t" href="../vue/sign_up.php">S'inscrire</a>
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