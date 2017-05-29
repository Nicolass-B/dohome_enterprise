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
    <link rel="stylesheet" href="../css/style_sign_up.css">;
</head>

<body>
<div class="connexion-inscription">
    <form method="POST" action="../controller/redigermessage.php" id="message">
        <input type="text" name="Titre" placeholder="Sujet du message" required/>
        <input type="submit" name="envoi" value="Envoyer Le Message"/>
        <input type="text" name="destinaire"">
        <div id="livesearch"></div>
        </br>
        <textarea form="message" name="contenu" id="taid" cols="35" rows="10" wrap="soft"></textarea>
    </form>
</div>

</body>

<script>
    $(document).ready(function () {
        $('input.destinataire').typeahead({
            name: 'destinataire',
            remote: '../controller/cherchedestinataire.php?q=%QUERY',
            limit: 10
        });
    });
</script>

<?php include 'bas_de_page.php'; ?>