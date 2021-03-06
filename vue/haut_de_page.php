<!DOCTYPE html>
<html xmlns:justify>

<head>
    <link rel="stylesheet" href="../css/haut_bas_de_page.css"/>
    <meta charset="UTF-8">
    <title><?php if (isset($titre)) {
            echo $titre;
        } else {
            echo 'Dohome';
        }; ?></title>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/typeahead.min.js"></script>
</head>


<header>
    <section1>
        <div class="container">
                <img class="logo" src="../vue/img/fond_transparent3.png" alt="logo de l'entreprise" />
            <nav>
                <ul>
                    <div class="menu">
                        <li><a href="../controller/dashboard.php">Dashboard</a></li>
                        <li><a href="../controller/edit_affiche_profil.php">Mon profil</a></li>
                        <li><a href="../controller/maison.php">Ma maison</a></li>
                        <li><a href="../controller/shop.php">Boutique</a></li>
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
        <a class="LienImage" href="../controller/messagerie.php"><img class="mail" src="../vue/img/icon_email.png"
                                                                      alt="logo de l'email"/></a>
        <a class="LienImage" href="../controller/deconnexion.php"><img class="deconexion"
                                                                       src="../vue/img/icon_deconnexion.png"
                                                                       alt="logo de la deco"/></a>

    </section1>
</header>


</html>