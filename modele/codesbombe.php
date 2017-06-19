<?php
//hash le mdp qui est dans la bdd
include('init_connexion_bdd.php');
function modifmdp(PDO $bdd,$id_user){
$reponse = $bdd-> prepare('SELECT mot_de_passe FROM  user  WHERE id_user=\'' . $id_user . '\' ');
$reponse->execute();
$pass = $reponse->fetch();
$passcrypt=sha1($pass['mot_de_passe']);
$updateavatar= $bdd->prepare('UPDATE user SET mot_de_passe= :passcrypt WHERE id_user=:id_user');
$updateavatar-> execute(array(
'passcrypt'=>$passcrypt,
'id_user'=>$id_user
));
//var_dump($pass);
//var_dump($passcrypt);
}
for($i=1;1<10;$i++){
modifmdp($bdd,$i);
}