<?php
if (!isset($_SESSION)) {session_start();}
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
?>