<?php
if (!isset($_SESSION)) {
    session_start();
}
?>


<!DOCTYPE html>
<html xmlns:justify>

<head>
    <link rel="stylesheet" href="../css/boutique_css.css"/>
    <meta charset="UTF-8">
    <title>Boutique</title>
</head>

<?php include("haut_de_page.php"); ?>
<body>

<section>
    <texteintro>
        La boutique Dohome enterprise vous permet de vous procurrer les équipements nécessaires </br>
        pour le bon fonctionnement de votre solution domotique
    </texteintro>
</section>

<section>

    <block1>
        <div class="temperature">
            <p>Capteur de température</p>
            <img id="temperature" src="../vue/img/temperature.png" alt="thermometre"/>
            <h5>Quantité</h5>
            <select name="quantite" id="quantite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            </br>
            <input id="ajout" type="submit" name="ajout" value="Ajouter au panier"/>

        </div>

        <div class="camera">
            <p>Caméra</p>
            <img id="camera" src="../vue/img/camera.png" alt="camera"/>
            <h5>Quantité</h5>
            <select name="quantite" id="quantite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            </br>
            <input id="ajout" type="submit" name="ajout" value="Ajouter au panier"/>

        </div>

    </block1>
    <block2>
        <div class="fumee">
            <p>Détecteur de gaz</p>
            <img id="feu" src="../vue/img/feu.png" alt="feu"/>
            <h5>Quantité</h5>
            <select name="quantite" id="quantite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            </br>
            <input id="ajout" type="submit" name="ajout" value="Ajouter au panier"/>

        </div>

        <div class="alarme">
            <p>Alarme</p>
            <img id="alarme" src="../vue/img/alarme.png" alt="alarme"/>
            <h5>Quantité</h5>
            <select name="quantite" id="quantite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            </br>
            <input id="ajout" type="submit" name="ajout" value="Ajouter au panier"/>

        </div>

    </block2>

</section>


</body>

<?php include("bas_de_page.php"); ?>


</html>