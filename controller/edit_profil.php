<?php
if (!isset($_SESSION)) {session_start();}

/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 24/05/2017
 * Time: 14:29
 */
require ( '../controller/mon_profil.php');
if(isset($_POST['envoiProfil'])){

    if(isset($_POST['newnom']) && !empty($_POST['newnom']) && $_POST['newnom']!=$infoUser['Nom']){
        $newnom = htmlentities($_POST['newnom']);
        $insertnom = $dbh-> prepare("UPDATE user SET Nom= ? WHERE Mail= ?" );
        $insertnom-> execute(array($newnom,$_SESSION['Mail']));
        header('location:../controller/mon_profil.php');
    }
    if(isset($_POST['newprenom']) && !empty($_POST['newprenom']) && $_POST['newprenom']!=$infoUser['Prenom']){
        $newprenom = htmlentities($_POST['newprenom']);
        $insertprenom = $dbh-> prepare("UPDATE user SET Prenom= ? WHERE Mail= ?" );
        $insertprenom-> execute(array($newprenom,$_SESSION['Mail']));
        header('location:../controller/mon_profil.php');
    }
    if(isset($_POST['newadresse']) && !empty($_POST['newadresse']) && $_POST['newadresse']!=$infoUser['Adresse']){
        $newadresse = htmlentities($_POST['newprenom']);
        $insertadresse = $dbh-> prepare("UPDATE user SET Adresse= ? WHERE Mail= ?" );
        $insertadresse-> execute(array($newadresse,$_SESSION['Mail']));
        header('location:../controller/mon_profil.php');
    }
    if(isset($_POST['newtel']) && !empty($_POST['newtel']) && $_POST['newtel']!=$infoUser['telephone']){
        $newtel = htmlentities($_POST['newtel']);
        $inserttel = $dbh-> prepare("UPDATE user SET telephone= ? WHERE Mail= ?" );
        $inserttel-> execute(array($newtel,$_SESSION['Mail']));
        header('location:../controller/mon_profil.php');
    }
    if(isset($_POST['newdatenaissance']) && !empty($_POST['newdatenaissance']) && $_POST['newdatenaissance']!=$infoUser['date_naissance']){
        $newdatenaissance = htmlentities($_POST['newdatenaissance']);
        $insertadresse = $dbh-> prepare("UPDATE user SET date_naissance= ? WHERE Mail= ?" );
        $insertadresse-> execute(array($newdatenaissance,$_SESSION['Mail']));
        header('location:../controller/mon_profil.php');
    }

    if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && !empty($_POST['newmdp2']) && isset($_POST['newmdp2'])){
        //pense a crypter ton mdp
        $mdp1 = htmlentities($_POST['newmdp1']);
        $mdp2 = htmlentities($_POST['newmdp2']);
        if($mdp1 == $mdp2){
            $insertmdp = $dbh->prepare("UPDATE user SET mot_de_passe = ? WHERE Mail=? ");
            $insertmdp->execute(array($mdp1,$_SESSION['Mail']));
            header('location:../controller/mon_profil.php');
        }
        else{
            $msg = "Vos deux mdp ne correspondent pas!";
        }
    }

    if(isset($_POST['newmail']) && !empty($_POST['newmail'])&&  $_POST['newmail']!=$_SESSION['Mail'] ){
    $newmail = htmlentities($_POST['newnom']);
    $insertmail = $dbh-> prepare("UPDATE user SET Mail= ? WHERE id= ?" );
    $insertmail-> execute(array($newmail,$_SESSION['id_user']));
    include ('../controller/deconnexion.php');
    }
}
