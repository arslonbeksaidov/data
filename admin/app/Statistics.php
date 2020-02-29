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
    public $connection;

    function countTableRow($table)
    {
        $con = self::get();
        $sql = "SELECT COUNT(*) as Number FROM $table";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $number = $stmt->fetch();
        return $number[0];


    }

    public function getNumberMessages()
    {
        $con = self::get();
        $sql = "SELECT COUNT(*) as Number FROM message where isSeen = 0";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $number = $stmt->fetch();
        return $number[0];
    }

    public function getUnReadMessages()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM message WHERE isSeen=0 ORDER by id DESC LIMIT 3 ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}


//        $Statistics = new Statistics();
//    var_dump($Statistics->countTableRow('user')) ;


