<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/17/2020
 * Time: 8:41 PM
 */
require 'DataConnection.php';

class Statistics extends DataConnection
{

    function countTableRow($table)
    {
        $con = self::get();
        $sql = "SELECT COUNT(*) as Number FROM $table";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $number = $stmt->fetch();
        return $number[0];


    }

}


//        $Statistics = new Statistics();
//    var_dump($Statistics->countTableRow('user')) ;


