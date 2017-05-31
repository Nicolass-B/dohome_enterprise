<?php
<<<<<<< HEAD
include_once ('../modele/initConnexionBDD.php');
$key=$_GET['q'];
$array = array();
$query=$dbh->prepare("SELECT Nom FROM user LIKE '%{$key}%'");
while($row=$query->fetch())
{
    $array[] = $row['Nom'];
}
echo json_encode($array);
=======
//database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dohome';

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//get search term
$name = $_GET['term'];

//get matched data from skills table
$query = $db->query("SELECT id, Nom, Prenom FROM user WHERE Prenom LIKE '%" . $name . "%' OR Nom LIKE '%" . $name  ."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['Nom'];
    //$data[] = $row['Prenom'];
}

//return json data
echo json_encode($data);
>>>>>>> origin/master
?>