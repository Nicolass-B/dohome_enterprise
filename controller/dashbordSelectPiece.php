<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/06/2017
 * Time: 13:55
 */
include ('../modele/init_connexion_bdd.php');

if (!isset($_SESSION)) {session_start();}

$id_maison=$_GET['q'];

$reponse = $bdd -> query('SELECT Nom,ID_pieces FROM pieces WHERE ID_Maison=\'' . $id_maison . '\'');
?>
<select id="piece" name="piece"  onchange="showUser2(this.value)">

<option selected="selected" value="">Choissisez votre piece</option>
<?php
while ($donnees=$reponse->fetch()){
    $donneesIDPieces=$donnees['ID_pieces'];
    $donneesNOMPieces=$donnees['Nom'];

    echo "<option name='.$donneesNOMPieces.' value='.$donneesIDPieces.' >".$donnees['Nom']."</option>";
}
?>
</select>