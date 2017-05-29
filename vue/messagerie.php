<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/haut_bas_de_page.css"/>
    <title> Mon profil </title>
</head>
<?php include("haut_de_page.php"); ?>

<body>
<section>
    <div class="information">
        <fieldset>

        <ul>
            <div class="menusec">
                <li class="enCours"><a href="messagerie.php">Contactez-nous</a></li>
                <li><a href="messagerie.php">Ma boîte de récéption</a></li>
            </div>
        </ul>


            <form method="post" action="">
                <div class="test">
                    <ul>
                        <li>
                            <label>Objet du message</label> </br>
                            <input type="text" name="objet" placeholder="Entrez l'objet de votre message" required/>
                        </li>
                        <li>
                            <label>Message</label> </br>
                            <textarea type="text" name="message" placeholder="Entrez votre message"></textarea>
                        </li>
                    </ul>

                </div>
            </form>
            <div class="bouton3">
                <input type="button" value="Envoyer votre message" href="lien" id="bouton3"/>
            </div>

        </fieldset>
    </div>

</section>


</body>


<?php include("bas_de_page.php"); ?>

</html>