<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 26/05/2017
 * Time: 10:43
 */


include_once('haut_de_page.php');

?>

    <head>
        <link rel="stylesheet" href="../css/message_css.css"/>
        <meta charset="UTF-8">
        <title>Message</title>
    </head>

    <body>
    <div class="section">
        <div class="message">
            <p> Objet: <?php echo $message['Titre'] ?> </p>
            <p> Date d'expédition:  <?php echo $message['Date'] ?></p>
            <p> Expéditeur: <?php echo $message['Nom'] ?>  </p>
        </div>
        <div class="milieu"> Message</div>
        </br>
        <div class="message2"
            <p> <?php echo $message['contenu'] ?> </p>
        </div>
        <div class="retour">
            <h2>
                <a href="../controller/messagerie.php" style="color: white"> Retour </a>
            </h2>

        </div>
    </div>
    </body>

<?php
include_once('bas_de_page.php');
?>