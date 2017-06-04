<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 29/05/2017
 * Time: 11:29
 */
include 'haut_de_page.php';

?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" HREF="../css/tableau.css">
        <link rel="stylesheet" href="../css/messagerie.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
    <div class="joli-form">
        <div class="ui-widget">
            <form method="POST" action="../controller/redigermessage.php" id="message">
                <label>Objet : </label>
                <input type="text" name="Titre" placeholder="Sujet du message" required/>
                </br>
                <label for="destinataire">Pour : </label>
                <input type="text" name="destinaire" id="destinataire" placeholder="Destinataire" ">
                </br>
                <textarea form="message" name="contenu" id="taid" cols="35" rows="10" wrap="soft"></textarea>
                <br>
                <div id="wrapper">
                    <div class="g-recaptcha" data-sitekey="6Ldd3iMUAAAAABCNW9rU3_6GWdrqLpKllXCOEDnK"></div>
                    <input type="submit" name="envoi" value="Envoyer Le Message"/>
                </div>

            </form>
        </div>
    </div>
    </body>

    <script>
        $(function () {
            $("#destinataire").autocomplete({
                source: '../controller/cherchedestinataire.php'
            });
        });
    </script>

<?php include 'bas_de_page.php'; ?>