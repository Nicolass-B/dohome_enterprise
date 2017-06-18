<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_sign_up.css"/>
    <title>Inscription</title>
</head>

<header>
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
                            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom"
                                   value="<?php if (isset($_SESSION['nom']) && !empty($_SESSION['nom'])) {
                                       echo $_SESSION['nom'];
                                   } ?>" required/>
                        </p>

                        <label for="prenom">Prénom </br></label>
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom"
                               value="<?php if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) {
                                   echo $_SESSION['prenom'];
                               } ?>" required/>
                        </br></br>
                        <label for="E-mail">E-mail </br></label>
                        <input type="email" name="E-mail" id="E-mail" placeholder="Entrez votre adresse mail"
                               value="<?php if (isset($_SESSION['E-mail']) && !empty($_SESSION['E-mail'])) {
                                   echo $_SESSION['E-mail'];
                               } ?>" required/>
                        </br></br>
                        <label for="pass">Mot de passe </br></label>
                        <input type="password" name="pass" id="pass" placeholder="Entrez votre mot de passe" required/>
                        </br></br>
                        <label for="confirmePasse">Confirmation du mot de passe </br></label>
                        <input type="password" name="confirmePasse" id="confirmePasse"
                               placeholder="Confirmation mot de passe" required/>
                        </br></br>
                        <label for="adresse">Adresse </br></label>
                        <input type="text" name="adresse" id="adresse" placeholder="Adresse/Code postal/Ville"
                               value="<?php if (isset($_SESSION['adresse']) && !empty($_SESSION['adresse'])) {
                                   echo $_SESSION['adresse'];
                               } ?>" required/>
                        </br></br>

                    </div>

                    <div class="test2">
                        <p>
                            <label for="sexe">Sexe</label><br/>
                            <select name="sexe" id="sexe">
                                <option value="homme" <?php if (isset($_SESSION['sexe']) && !empty($_SESSION['sexe']) && $_SESSION['sexe'] == 'homme') {
                                    echo 'selected';
                                } ?> >Homme
                                </option>
                                <option value="femme" <?php if (isset($_SESSION['sexe']) && !empty($_SESSION['sexe']) && $_SESSION['sexe'] == 'femme') {
                                    echo 'selected';
                                } ?> >Femme
                                </option>
                            </select>
                        </p>

                        <p>

                            <label for="date">Date de naissance</label><br/>
                            <?php echo '<select name="jour" id="jour">';
                            $selected = '';
                            for ($jour = 1; $jour <= date('t'); $jour++) {
                                if (isset($_SESSION['jour']) && !empty($_SESSION['jour']) && $jour == $_SESSION['jour']) {
                                    $selected = 'selected="selected"';
                                }
                                if ($jour < 10) {
                                    echo '<option value="', '0' . $jour, '"', $selected, '>', $jour, '</option>';
                                } else {
                                    echo '<option value="', $jour, '"', $selected, '>', $jour, '</option>';
                                }
                                $selected = '';
                            }
                            echo '</select>';
                            ?>
                            <?php
                            $moisLettre = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars',
                                4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
                                7 => 'Juillet', 8 => 'Aout', 9 => 'Septembre',
                                10 => 'Octobre', 11 => 'Novembre', 12 => 'Decembre');
                            $selected = '';
                            echo '<select name="mois" id="mois">';
                            for ($moisChiffre = 1; $moisChiffre <= 12; $moisChiffre++) {
                                if (isset($_SESSION['sexe']) && !empty($_SESSION['sexe']) && $moisChiffre == $_SESSION['mois']) {
                                    $selected = 'selected="selected"';
                                }
                                if ($moisChiffre < 10) {
                                    echo '<option value="', '0' . $moisChiffre, '"', $selected, '>', $moisLettre[$moisChiffre], '</option>';
                                } else {
                                    echo '<option value="', $moisChiffre, '"', $selected, '>', $moisLettre[$moisChiffre], '</option>';
                                }
                                $selected = '';

                            }
                            echo '</select>';
                            ?>

                            <?php
                            //petit php pour les annnées
                            // Variable qui ajoutera l'attribut selected de la liste déroulante
                            $selected = '';
                            // Parcours du tableau
                            echo '<select name="année" id="année">';
                            for ($annee = date('Y'); $annee >= 1900; $annee--) {
                                // L'année est-elle l'année courante ?
                                if (isset($_SESSION['année']) && !empty($_SESSION['année']) && $annee == $_SESSION['année']) {
                                    $selected = ' selected="selected"';
                                }
                                // Affichage de la ligne
                                echo '<option value="', $annee, '"', $selected, '>', $annee, '</option>';
                                // Remise à zéro de $selected
                                $selected = '';
                            }
                            echo '</select>';
                            ?>


                        </p>

                        <p>
                            <label for="tel">Numéro de téléphone </br></label>
                            <input type="tel" name="tel" id="tel" placeholder="Entrez votre numéro de téléphone"
                                   maxlength="10" pattern="^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$"
                                   value="<?php if (isset($_SESSION['tel']) && !empty($_SESSION['tel'])) {
                                       echo $_SESSION['tel'];
                                   } ?>" required/>
                        </p>

                        <p>
                            <label for="questionSecrete">Choississez votre question secrête</br></label>
                            <select name="questionSecrete" id="questionSecrete">
                                <option value="Quel est le nom de la rue où demeurait mon meilleur ami d'enfance ?"
                                    <?php if(isset($_SESSION['questionSecrete'])&& !empty($_SESSION['questionSecrete']) &&$_SESSION['questionSecrete']=='Quel est le nom de la rue où demeurait mon meilleur ami d\'enfance ?'){echo'selected';} ?>>
                                    Quel est le nom de la rue où demeurait mon meilleur ami d'enfance ?</option>

                                <option value="Quel est le plus beau cadeau que j'ai reçu ?"
                                    <?php if(isset($_SESSION['questionSecrete'])&& !empty($_SESSION['questionSecrete']) &&$_SESSION['questionSecrete']=='Quel est le plus beau cadeau que j\'ai reçu ?'){echo'selected';} ?>>
                                    Quel est le plus beau cadeau que j'ai reçu ?</option>

                                <option value="Quel est votre personnage de série préféré ?"
                                    <?php if(isset($_SESSION['questionSecrete'])&& !empty($_SESSION['questionSecrete']) &&$_SESSION['questionSecrete']=='Quel est votre personnage de série préféré ?'){echo'selected';} ?>>
                                    Quel est votre personnage de série préféré ?</option>

                            </select>
                        </p>

                        <p>
                            <label for="repSecrete">Réponse à la question secrête</br></label>
                            <input type="text" name="repSecrete" id="repSecrete" placeholder="Entrez votre réponse secrête" value= "<?php if(isset($_SESSION['repSecrete'])&& !empty($_SESSION['repSecrete'])){echo $_SESSION['repSecrete'];} ?>" required/>
                        </p>

                        <p><input value="j'accepte" type="radio" name="memo" id="memo"/>
                            <label for="memo">J'ai lu et j'accepte les conditions d'utilisation</label>
                        </p>

                        <input class="bouton1" type="submit" name="envoi" value="Créer mon compte"/>
                        <br><br>
                        <a class="bouton1" href="../controller/home.php">retour</a>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php if (isset($error)) {
            echo '<div class="success">' . $error . '</div>';
        }; ?>

    </div>
</section>


</body>
<?php include("bas_de_page.php"); ?>

</html>