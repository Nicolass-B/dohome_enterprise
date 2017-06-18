<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 26/05/2017
 * Time: 10:43
 */


include_once('haut_de_page.php');

?>

    <body>

    <div>
        <h1> <?php echo $message['Titre'] ?> </h1>
        <h2> <?php echo $message['Date'] ?></h2>
        <h2> <?php echo $message['Nom'] ?>   </h2>
    </div>
    <div>
        <p> <?php echo $message['contenu'] ?> </p>
    </div>
    <div>
        <h2>
            <a href="../controller/messagerie.php" style="color: white"> Retour </a>
        </h2>

    </div>

    </body>

<?php
include_once('bas_de_page.php');
?>