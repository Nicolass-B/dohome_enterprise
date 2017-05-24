<!DOCTYPE html>
<html xmlns:justify xmlns:text-justify="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="../css/haut_bas_de_page.css"/>
    <meta charset="UTF-8">
    <title>Nom de la page</title>
</head>


<header>
    <section1>
        <div class="container">
            <img class="logo" src="../vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
            <nav>
                <ul>
                    <div class="menu">
                        <li><a href="../vue/dashboard.php">Dashboard</a></li>
                        <li><a href="../vue/mon_profil.php">Mon profil</a></li>
                        <li><a href="../controller/maison.php">Ma maison</a></li>
                        <li><a href="../vue/boutique.php">Boutique</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </section1>
    <section1>
        <div class="recherche">
            <form action="/search" id="searchthis" method="get">
                <input id="search" name="q" type="text" placeholder="Rechercher"/>
                <input id="search-btn" type="submit" value="Rechercher"/>
            </form>
        </div>
    </section1>
    <section1>
        <a class="LienImage" href="../vue/messagerie.php"><img class="mail" src="../vue/img/icon_email.png" alt="logo de l'email"/></a>
        <a class="LienImage" href="../vue/home.php"><img class="deconexion" src="../vue/img/icon_deconnexion.png" alt="logo de la deco"/></a>

    </section1>
</header>



</html>