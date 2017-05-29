<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <title>Ma Boutique</title>
    <link rel="stylesheet" href="../css/Boutique.css"/>

    <D>
        <section>
            <div class="container">
                <img class="logo" src="../img/fond_transparent3.png" alt="logo de l'entreprise">
                <nav>
                    <ul class="menu">
                        <li>Dashboard</li>
                        <li>Mon profil</li>
                        <li>Ma maison </li>
                        <li><span id="boutique">Boutique</span> </li>
                    </ul>
                </nav>
            </div>
        </section>

        <section>
            <div class="recherche">
                <form action="/search" id="searchthis" method="get">
                    <input id="search" name="q" type="text" placeholder="Rechercher" />
                    <input id="search-btn" type="submit" value="Rechercher" />
                </form>
            </div>
        </section>

    </D>
</header>


<body>
<x>
    <section1>
        <a href="Maison.php" >
            <div class="Offres">
                <p>Nos Offrres</p>
            </div>
        </a>


    </section1>

    <section2>
        <a href="Maison.php" >
            <div class="Promotions">
                 <p>Nos Promotions </p>


             </div>
        </a>

    </section2>

    <section3>
        <a href="Maison.php" >
            <div class="Produits">
                <p>
            Tous nos produits
                </p>
        </div>
        </a>

    </section3>

</x>
</body>
<footer>
    <div class="Powered">Powered By DoHome Enterprise™</div>
    <div class="Mentions">Mentions Légales</div>
</footer>
</html>