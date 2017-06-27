<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/profil.css"/>
    <title> Mon profil </title>
</head>
<?php include("haut_de_page.php"); ?>

<body>


<section>
    <div class="information">
        <ul>
            <div class="menusec">
                <li class="enCours"><a href="../controller/edit_affiche_profil.php">Mon profil</a></li>
                <li><a href="../controller/compte_secondaire.php">Mes comptes secondaires</a></li>
            </div>
        </ul>
    </div>

    <form method="POST" action="../controller/edit_affiche_profil.php">
        <div class="formulaire">
            <div class="information">
                <ul>
                    <div class="aligne">
                        <label for="newnom">Nom</label>
                        <li><input type="text" name="newnom" value="<?php echo $infoUser["Nom"]; ?>"/></li>
                        <label for="newprenom">Prénom</label>
                        <li><input type="text" name="newprenom" value="<?php echo $infoUser["Prenom"]; ?>"/></li>

                        <label for="newadresse">Adresse</label>
                        <li><input type="text" name="newadresse" value="<?php echo $infoUser["Adresse"]; ?>"/></li>
                        <label for="newdateNaissance">Date de naissance</label>
                        <li>
                            <?php
                            $selected='';
                            echo '<select name="jour" id="jour">';
                            for($jour=1;$jour <= date('t');$jour++){
                                if ($jour==$infoUser['days']) {
                                    $selected = 'selected="selected"';
                                }
                                if($jour<10){
                                    echo '<option value="', '0'.$jour ,'"',$selected,'>',$jour ,'</option>';
                                }
                                else{
                                    echo '<option value="', $jour ,'"',$selected,'>', $jour ,'</option>';
                                }
                                $selected='';

                            }
                            echo '</select>';
                            ?>

                            <?php
                            $moisLettre = array(1=>'Janvier', 2=>'Février', 3=>'Mars',
                                4=>'Avril', 5=>'Mai', 6=>'Juin',
                                7=>'Juillet', 8=>'Aout', 9=>'Septembre',
                                10=>'Octobre', 11=>'Novembre', 12=>'Decembre');
                            $selected='';
                            echo '<select name="mois" id="mois">';
                            for($moisChiffre=1;$moisChiffre <= 12;$moisChiffre++){
                                if ($moisChiffre==$infoUser['months']) {
                                    $selected = 'selected="selected"';
                                }
                                if($moisChiffre<10){
                                    echo '<option value="', '0'.$moisChiffre ,'"',$selected,'>',$moisLettre[$moisChiffre] ,'</option>';
                                }
                                else{
                                    echo '<option value="', $moisChiffre ,'"',$selected,'>', $moisLettre[$moisChiffre] ,'</option>';
                                }
                                $selected='';

                            }
                            echo '</select>';
                            ?>

                            <?php
                            //petit php pour les annnées
                            // Variable qui ajoutera l'attribut selected de la liste déroulante
                            $selected = '';
                            // Parcours du tableau
                            echo '<select name="annee" id="annee">';
                            for($i=date('Y'); $i>=1900; $i--)
                            {
                                // L'année est-elle l'année courante ?
                                if($i == $infoUser['years'])
                                {
                                    $selected = ' selected="selected"';
                                }
                                // Affichage de la ligne
                                echo '<option value="', $i ,'"', $selected ,'>', $i ,'</option>';
                                $selected='';
                            }
                            echo '</select>';
                            ?>
                        </li>

                        <label for="newtel">Numéro de téléphone</label>
                        <li><input type="tel" name="newtel" value="<?php echo $infoUser["telephone"]; ?>"/></li>
                    </div>
                    <div class="aligne2">
                        <label for="newmail">E-mail</label>
                        <li><input type="email" name="newmail" value="<?php echo $_SESSION['Mail']; ?> " disabled/></li>
                        <label for="entermdpactuel">Mot de passe actuel</label>
                        <li><input type="password" name="entermdpactuel" value=""/></li>
                        <label for="newmdp">Mot de passe</label>
                        <li><input type="password" name="newmdp" value=""/></li>
                        <label for="newconfirmeMdp">Confirmation Mot de passe</label>
                        <li><input type="password" name="newconfirmeMdp" value=""/></li>

                    </div>
                </ul>
                <input type="submit" name="envoiProfil" value="Modifier mon profil">


            </div>
        </div>

    </p>
</form>
    <?php if(isset($msg)){ echo $msg;} ?>

</section>
</body>
<?php include("bas_de_page.php"); ?>

</html>