<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 21/05/2017
 * Time: 16:08
 */

include("haut_de_page.php");
?>
    <div>
        <?php
        highlight_string("<?php\n\$data =\n" . var_export($Capteur, true) . ";\n?>");
        ?>
    </div>
<?php include("bas_de_page.php"); ?>

