<?php
/**
 * Controller pour la creation de nouveaux capteurs et
 * leur rattachement à une piece et une une maison.
 *
 */
include('../Modele/init_connexion_bdd.php');
$idmaison = 1; //$_SESSION['idmaison']; to add quand on aura les sessions
$query = "SELECT ID_pieces,Nom FROM pieces WHERE ID_Maison =:idmaison";
$sql = $bdd->prepare($query);
$sql->bindParam(':idmaison', $idmaison);
$sql->execute();
$sql->fetch();
var_dump($sql);
include('../Vue/capteur.php');


if(isset($_POST['ajout']))
{
    echo "<p>DAMN, tu viens d'ajouter un capteur dans la pièce !</p>";
}