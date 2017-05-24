<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 24/05/2017
 * Time: 10:50
 */
if (!isset($_SESSION))
{
    session_start();
}
echo  $_SESSION['Mail'];
// On détruit les variables de notre session
session_unset ();
echo  $_SESSION['Mail'];
// On détruit notre session
session_destroy ();
echo  $_SESSION['Mail'];
header('location: ../Vue/home.php');
