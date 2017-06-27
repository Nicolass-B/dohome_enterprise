<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 19/06/2017
 * Time: 19:56
 */
include('../modele/init_connexion_bdd.php');

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");


$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
}


$trame = $data_tab[1];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");




function trameToHisto(PDO $bdd, $team)
{
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=" . $team);
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

    for ($i = 6683+$compteur, $size = count($data_tab); $i < $size; $i++) {
        list($t, $o, $r, $c, $n, $valeur, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

        $date = $year ."-". $month ."-". $day ." ". $hour .":". $min .":". $sec;
        //$date = new DateTime($date);
        if($c == 1){ // done l'unité en focntion du type de capteur dans la trame
            $unite = 'C';
            $ID_capteur = 3;
        } else if ($c == 2){ //
            $unite = 'Cm';
            $ID_capteur = 5;
        } else if ($c == 3){ //illumination
            $unite = 'Lux';
            $ID_capteur = 4;
        }

        try {
            $sql->execute(array(
                'datemesure' => $date,
                'valeur' => hexdec($valeur),
                'unite' => $unite,
                'idcapteur' => $ID_capteur
            ));
        } catch (PDOException $e){
            echo '<br> erreur : ' . $e->getMessage(). "          val ". $valeur. "   chaine : ". $data_tab[$i];
        }
    }
    $lol = $bdd->prepare("UPDATE compteurtrame SET compteur =:total");
    $lol->execute(["total" => $size-6683]);

}

trameToHisto($bdd, "006A");