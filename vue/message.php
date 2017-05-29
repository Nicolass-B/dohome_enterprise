<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 26/05/2017
 * Time: 10:43
 */

include_once('../css/tableau.css');
include_once('haut_de_page.php');
include_once('bas_de_page.php');

?>

<body>

<div>
    <h1> <?php echo $message['Titre'] ?> </h1>
    <h2> <?php echo $message['Time_Stamp'] ?></h2>
    <h2> <?php echo $message['ID_expediteur'] ?>   </h2>
</div>
<div>
    <p> <?php echo $message['contenu'] ?> </p>
</div>
<div>
    <a href="../controller/messagerie.php"> Retour </a>
</div>

</body>
