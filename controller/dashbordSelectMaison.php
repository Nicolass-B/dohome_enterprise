<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/06/2017
 * Time: 13:36
 */


include ('../modele/init_connexion_bdd.php');
if (!isset($_SESSION)) {session_start();}

$reponse = $bdd -> query('SELECT Nom,Id_user FROM maison WHERE ID_user=\'' . $_SESSION['id_user'] . '\'');

while ($donnees=$reponse->fetch()){
    $donneesID=$donnees['Id_user'];
    $donneesNOM=$donnees['Nom'];

    echo "<option  name='.$donneesNOM.' value='.$donneesID.' >".$donnees['Nom']."</option>";
}
