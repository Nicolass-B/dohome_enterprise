<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 22/05/2017
 * Time: 01:12
 */
//Quand tu fais une belle faq des familles

if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['id_user'])){
include_once('haut_de_page.php');
}
?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/faq.css"/>
    <title>Accueil DoHome enterprise ™</title>
</head>


<div class="faq">
    <section>
        <h1>FAQ</h1>

        <?php
        foreach ($data as $row) {
            ?>

            <table>
                <?php
                echo "<tr>" . "<div class='question'>" . $row["question"] . "</div> </br> <div class='reponse'> " . $row["reponse"] . "</div></tr>" . "</br></br>";
                ?>
            </table>
            <?php
        }
        ?>
    </section>
</div>
<?php

if(!isset($_SESSION['id_user'])){
    echo '<div class="retour">';
    echo '<a class="boutonRetour" href="../vue/home.php">Retour a l\'accueil </a>';
    echo '</div>';
}
include_once('bas_de_page.php');

?>