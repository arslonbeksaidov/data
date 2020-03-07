<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 3/5/2020
 * Time: 3:31 PM
 */


namespace MyAutoloader;


class MyAutoloader
{
    public static function ClassLoader($className)
    {

        include $className.'.php';

    }

}
spl_autoload_register(__NAMESPACE__.'\MyAutoloader::ClassLoader');
//new \Post();