<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_sign_up.css"/>
    <title>Inscription</title>
</head>

<header>
    <section1>
        <div class="container">
            <img class="logo" src="../vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
            <nav>
                <ul>
                    <div class="menu">
                        <li><a href="">FR</a></li>
                        <li><a href="">EN</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </section1>

</header>

<body>





<section>
    <div class="information">
        <form method="post" action="../controller/traitement_inscription.php">
            <fieldset>
                <legend>Inscription</legend>
                <div class="test">
                    <div class="test1">
                        <p>
                        <label for="nom">Nom </br></label>
                        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom"  required/>
                        </p>

                        <label for="prenom">Prénom </br></label>
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" required/>
                        </br></br>
                        <label for="E-mail">E-mail </br></label>
                        <input type="email" name="E-mail" id="E-mail" placeholder="Entrez votre adresse mail" required/>
                        </br></br>
                        <label for="pass">Mot de passe </br></label>
                        <input type="password" name="pass" id="pass" placeholder="Entrez votre mot de passe" required/>
                        </br></br>
                        <label for="confirmePasse">Confirmation du mot de passe </br></label>
                        <input type="password" name="confirmePasse" id="confirmePasse" placeholder="Confirmation mot de passe" required/>
                        </br></br>
                        <label for="adresse">Adresse </br></label>
                        <input type="text" name="adresse" id="adresse" placeholder="Adresse/Code postal/Ville" required/>
                        </br></br>

                    </div>

                    <div class="test2">
                        <p>
                            <label for="sexe">Sexe</label><br />
                            <select name="sexe" id="sexe"  >
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>
                        </p>

                        <p>

                            <label for="date">Date de naissance</label><br />
                           <?php echo '<select name="jour" id="jour">';
                                for($jour=1;$jour <= date('t');$jour++){
                                    if($jour<10){
                                        echo '<option value="', '0'.$jour ,'"','>',$jour ,'</option>';
                                    }
                                    else{
                                        echo '<option value="', $jour ,'"','>', $jour ,'</option>';
                                    }
                                }
                                echo '</select>';
                           ?>

                            <select name="mois" id="mois"  >
                                <option value="01">Janvier</option><option value="02">février</option>
                                <option value="03">Mars</option><option value="04">Avril</option>
                                <option value="05">Mai</option><option value="06">Juin</option>
                                <option value="07">Juillet</option><option value="08">Aout</option>
                                <option value="09">Septembre</option><option value="10">Octobre</option>
                                <option value="11">Novembre</option><option value="12">Décembre</option>
                            </select>

                                <?php
                                //petit php pour les annnées
                                // Variable qui ajoutera l'attribut selected de la liste déroulante
                                $selected = '';
                                // Parcours du tableau
                                echo '<select name="année" id="année">';
                                for($i=date('Y'); $i>=1900; $i--)
                                {
                                    // L'année est-elle l'année courante ?
                                    if($i == date('Y'))
                                    {
                                        $selected = ' selected="selected"';
                                    }
                                    // Affichage de la ligne
                                    echo '<option value="', $i ,'"', $selected ,'>', $i ,'</option>';
                                    // Remise à zéro de $selected
                                    $selected='';
                                }
                                echo '</select>';
                                ?>


                        </p>

                        <p>
                            <label for="tel">Numéro de téléphone </br></label>
                            <input type="tel" name="tel" id="tel" placeholder="Entrez votre numéro de téléphone" maxlength="10" pattern="^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" required/>
                        </p>
                        </br>

                         <p> <input type="radio" name="memo" id="memo"/>
                            <label for="memo">J'ai lu et j'accepte les conditions d'utilisation</label>
                         </p>

                        <input class="bouton1" type="submit" name="envoi" value="Créer mon compte" />
                    </div>
                </div>
            </fieldset>
        </form>
        <?php if(isset($error)){echo '<div class="success">'.$error.'</div>' ;} ; ?>

    </div>
</section>




</body>
<?php include("bas_de_page.php"); ?>

</html>