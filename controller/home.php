<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 13/06/2017
 * Time: 16:19
 */
if (!isset($_SESSION)) {
    session_start();
}

session_unset();
session_destroy();

include('../vue/home.php');