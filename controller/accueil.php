<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 21/05/2017
 * Time: 15:51
 */

// Se charge de tout display pour un utilisateur pas loggué
if (!isset($_SESSION)) {
    session_start();
}
require_once '../vue/home.php';

