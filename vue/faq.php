<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 22/05/2017
 * Time: 01:12
 */
//Quand tu fais une belle faq des familles
include_once('haut_de_page.php');
?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/haut_bas_de_page.css"/>
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
include_once('bas_de_page.php');

?>