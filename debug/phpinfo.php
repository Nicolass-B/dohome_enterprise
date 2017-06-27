<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 19/06/2017
 * Time: 20:02
 */
include '../modele/init_connexion_bdd.php';
$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=006A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33);

$sql = $bdd->prepare('INSERT INTO historique_capteurs(Id_mesure, Date_Mesure, Valeur, unite, ID_capteur) 
                            VALUES (NULL, :datemesure, :valeur, :unite, :idcapteur)');
$lol = $bdd->query("SELECT * FROM compteurtrame");
$lol = $lol->fetch();
$compteur = $lol[0];

echo $compteur;
echo "<br>";
echo count($data_tab);
echo "END";