<?php
include_once ('../modele/initConnexionBDD.php');
$key=$_GET['q'];
$array = array();
$query=$dbh->prepare("SELECT Nom FROM user LIKE '%{$key}%'");
while($row=$query->fetch())
{
    $array[] = $row['Nom'];
}
echo json_encode($array);
?>