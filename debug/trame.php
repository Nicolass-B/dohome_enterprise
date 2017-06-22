<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 19/06/2017
 * Time: 19:56
 */
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




function trameToHisto($bdd, $team)
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
    echo "Raw Data:<br />";
    echo("$data");

    $data_tab = str_split($data, 33);

    echo "Tabular Data:<br />";
    $bdd->prepare('INSERT INTO historique_capteurs(Id_mesure, Date_Mesure, Valeur, unite, ID_capteur) VALUES (NULL, :datetime, :valeur, :unite, :idcapteur)');
    for ($i = 6683, $size = count($data_tab); $i < $size; $i++) {
        list($t, $o, $r, $c, $n, $valeur, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($data_tab[i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

        $date = $year . $month . $day . $hour . $min . $sec;

        if($c == 1){ // done l'unité en focntion du type de capteur dans la trame

            $unite = 'C';
        }else if ($c == 2){
            $unite = 'Cm';
        }else if ($c == 3){
            $unite = 'UA';
        }


        $bdd->execute(array(
            'date' => $date,
            'valeur' => $valeur,
            'unite' => $unite
        ));

    }

}