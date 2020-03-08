<?php
/**
 * Created by PhpStorm.
 * UserOne: apple
 * Date: 2/17/2020
 * Time: 8:41 PM
 */
//require 'DataConnection.php';
require_once 'MyAutoloader.php';
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

    public function getUnReadMessages($limit = 3)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM message WHERE isSeen=0 ORDER by id LIMIT $limit");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllMessages()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM message  ORDER by id DESC");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteMessage($id)
    {

        try {
            $this->connection = self::get();
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM message WHERE id=$id";

            // use exec() because no results are returned
            $this->connection->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function findMessage($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM message WHERE id = $id";
            $sqlUpdate = "UPDATE message SET isSeen = 1 WHERE id = $id";

            $stmtUpdate = $this->connection->prepare($sqlUpdate);
            $stmt = $this->connection->prepare($sql);
            $stmtUpdate->execute();
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            return $result;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
if (isset($_REQUEST['delete']))
{
    $id = intval($_REQUEST['delete']);
    $Statistics = new Statistics();
    $Statistics->deleteMessage($id);
    header('Location: /admin/resours/xabarlar/hammaXabarlar.php');
}



//        $Statistics = new Statistics();
//    var_dump($Statistics->countTableRow('user')) ;


