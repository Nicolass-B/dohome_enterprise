<?php
$titre = 'Mes Capteurs';
include('haut_de_page.php');
require_once('..\Modele\Capteur.php');


?>

<body>
<div class="connexion-inscription">
    <form method="POST" action="../controller/newcapteur.php">

        <select name="type" required>
            <option value="temp">Température</option>
            <option value="light">Illumination</option>
            <option value="presence">Présence</option>
            <option value="son">Son</option>
        </select>
        <select name="piece" required>
            <?php

            foreach ($sql as $row) {
                echo "<option value=" . $row['ID_pièces'] . ">" . $row['Nom'] . "</option>";
            }
            var_dump($row)
            ?>
        </select>
        <input type="text" name="nom_capteur" placeholder="Nom du Capteur" required/>
        <input type="text" name="ajout" placeholder="1" hidden required/>
        <input type="submit" name="envoi" value="Valider"/>


    </form>
</div>


</body>