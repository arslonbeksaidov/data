<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/20/2020
 * Time: 12:26 AM
 */
session_start();
unset($_SESSION);
session_destroy();
header("location: ../resours/login.php");

?>