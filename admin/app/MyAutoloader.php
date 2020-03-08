<?php

/**
 * Created by PhpStorm.
 * UserOne: apple
 * Date: 3/5/2020
 * Time: 3:31 PM
 */


namespace MyAutoloader;
session_start();
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if ($_SESSION['role']!=1){
    header("location: /admin/resours/errorLogin.php");
}

class MyAutoloader
{
    public static function ClassLoader($className)
    {

        include $className.'.php';

    }

}
spl_autoload_register(__NAMESPACE__.'\MyAutoloader::ClassLoader');
//new \Post();