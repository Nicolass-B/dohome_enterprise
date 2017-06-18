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

    <article>
        <aside>
            <h1>FAQ</h1>
        </aside>

        <?php
        foreach ($data as $row) {
            ?>
            <p>
                <?php
                echo $row["question"] . " ----------------- " . $row["reponse"] . "<br>";
                ?>
            </p>
            <?php
        }

        ?>


    </article>

<?php
include_once('bas_de_page.php');

?>