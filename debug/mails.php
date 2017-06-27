
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine Poussot
 * Date: 26/06/2017
 * Time: 11:07
 */

require_once('../modele/init_connexion_bdd.php');
require_once('../modele/messagerie.php');

var_dump(getIdFromMail($bdd, "test@test.com"));