<?php
if (!isset($_SESSION)) {session_start();}

/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 24/05/2017
 * Time: 14:29
 */

if(isset($_POST['envoiProfil'])){
    include ('../modele/utilisateurs.php');
    $infoUser= takeInfoUser($bdd,$_SESSION['Mail']);

    if(isset($_POST['newnom']) && !empty($_POST['newnom']) && $_POST['newnom']!=$infoUser['Nom']){
        $newnom = htmlentities($_POST['newnom']);
        $insertnom = $bdd-> prepare("UPDATE user SET Nom= ? WHERE Mail= ?" );
        $insertnom-> execute(array($newnom,$_SESSION['Mail']));
       // $msg= "Modification prise en compte";

    }
    if(isset($_POST['newprenom']) && !empty($_POST['newprenom']) && $_POST['newprenom']!=$infoUser['Prenom']){
        $newprenom = htmlentities($_POST['newprenom']);
        $insertprenom = $bdd-> prepare("UPDATE user SET Prenom= ? WHERE Mail= ?" );
        $insertprenom-> execute(array($newprenom,$_SESSION['Mail']));
        //$msg= "Modification prise en compte";

    }
    if(isset($_POST['newadresse']) && !empty($_POST['newadresse']) && $_POST['newadresse']!=$infoUser['Adresse']){
        $newadresse = htmlentities($_POST['newprenom']);
        $insertadresse = $bdd-> prepare("UPDATE user SET Adresse= ? WHERE Mail= ?" );
        $insertadresse-> execute(array($newadresse,$_SESSION['Mail']));
       // $msg= "Modification prise en compte";
    }
    if(isset($_POST['newtel']) && !empty($_POST['newtel']) && $_POST['newtel']!=$infoUser['telephone']){
        $newtel = htmlentities($_POST['newtel']);
        $inserttel = $bdd-> prepare("UPDATE user SET telephone= ? WHERE Mail= ?" );
        $inserttel-> execute(array($newtel,$_SESSION['Mail']));
        //$msg= "Modification prise en compte";

    }

    if(isset($_POST['newdateNaissance']) && !empty($_POST['newdateNaissance']) && $_POST['newdateNaissance']!=$infoUser['date_naissance']){
        $newdateNaissance = htmlentities($_POST['newdateNaissance']);
        $insertdatenaissance = $bdd-> prepare("UPDATE user SET date_naissance= ? WHERE Mail= ?" );
        $insertdatenaissance-> execute(array($newdateNaissance,$_SESSION['Mail']));
        //$msg= "Modification prise en compte";

    }



    if(!empty($_POST['entermdpactuel'] && isset($_POST['entermdpactuel']))){
        $mdpActuel=takeMdp($bdd,$_SESSION['Mail']);
        //verif entermdpactuel = mdp bdd
        if($mdpActuel['mot_de_passe']==$_POST['entermdpactuel']){
            //verif newmdp et newmdpconfirm
            if(isset($_POST['newmdp']) && !empty($_POST['newmdp']) && !empty($_POST['newconfirmeMdp']) && isset($_POST['newconfirmeMdp'])){
                //pense a crypter ton mdp
                if($_POST['newmdp'] == $_POST['newconfirmeMdp']){
                    $insertmdp = $bdd->prepare("UPDATE user SET mot_de_passe = ? WHERE Mail=? ");
                    $insertmdp->execute(array($_POST['newmdp'],$_SESSION['Mail']));
                    $msg= "Modification prise en compte";
                }

                else{
                    $msg= "Vos deux mdp ne correspondent pas!";
                }
            }

            else{
                $msg= 'veuillez entrez le nouveau mot de passe et la confirmation';
            }

        }
        else{
            $msg ='Mot de passe actuel invalide';
        }
    }
    include ('../controller/mon_profil.php');

}
