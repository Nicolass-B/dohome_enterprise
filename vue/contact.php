<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/contact.css"/>
</head>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['id_user'])){
    include_once('haut_de_page.php');
} ?>
<body>

<x>
    <section>
        <div class="guillaume">
            <img class="img1" src="../vue/img/guigui.png" alt="plus">
            <p>Guillaume Froger Delapierre</p>
            <p>Directeur Communication</p>
        </div>

        <div class="nico">
            <img class="img2" src="../vue/img/Image3.png" alt="plus">
            <p>Nicolas Bennmenad</p>
            <p>Directeur Techniques</p>
        </div>

    </section>

    <section2>
        <div class="clem">
            <img class="img3" src="../vue/img/clem.png" alt="plus">
            <p>Clément Mosser</p>
            <p>Directeur Marketing</p>
        </div>


        <div class="ali">
            <img class="img4" src="../vue/img/ali.png" alt="plus">
            <p>Ali Kiris</p>
            <p>Directeur Financier</p>

        </div>
    </section2>

    <section3>
        <div class="antoine">
            <img class="img5" src="../vue/img/antoine.png" alt="plus">
            <p>Antoine Poussot</p>
            <p>CEO</p>

        </div>

        <div class="seb">
            <img class="img6" src="../vue/img/Image4.png" alt="plus">
            <p>Sébastien Gomez</p>
            <p>Stagiaire</p>
        </div>
    </section3>


</x>

<div class="retour">
<?php
if(!isset($_SESSION['id_user'])){
    echo '<a class="boutonRetour" href="../vue/home.php">Retour a l\'accueil</a>';
}
elseif (isset($signUp) && $signUp=='test'){
    echo '<a class="boutonRetour" href="../vue/sign_up.php">Retour a l\'inscription </a>';
}
?>
</div>

</body>
<?php include("bas_de_page.php"); ?>
</html>