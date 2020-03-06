<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/21/2020
 * Time: 12:39 PM
 */

//require 'DataConnection.php';
require_once "MyAutoloader.php";
if (isset($_REQUEST['delete'])) {
    $id = intval($_REQUEST['delete']);
} elseif (isset($_REQUEST['updatePage'])) {
    $id = intval($_REQUEST['updatePage']);
} elseif (isset($_REQUEST['sendUpdatedData1'])) {
    $id = intval($_REQUEST['sendUpdatedData1']);
    $cat_name = addslashes($_REQUEST['cat_name1']);
//        var_dump($id);die();
}

class User extends DataConnection
{
    public $connection;

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

    public function addUser()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_user'])) {

                $cat_name = addslashes($_POST['cat_name1']);
//                var_dump($cat_name);die();
                $sql = "INSERT INTO user ( username ) VALUES ( :username )";
                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':username', $cat_name1);
                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


    }

    function getAllUser()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM user");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function deleteUser($id)
    {
        try {
            $this->connection = self::get();
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM user WHERE id=$id";

            // use exec() because no results are returned
            $this->connection->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    function updateUser($id, $cat_name1)
    {
        try {

            $this->connection = self::get();
            $sql = "UPDATE user SET username = :username WHERE id = :id";
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':username', $cat_name1);
            $stmt->execute();
        } catch (PDOException $e) {
            echo '' . "<br>" . $e->getMessage();
        }
    }

    function getUpdateInfo(int $id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT id, username FROM user WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            return $result;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}


if (isset($_REQUEST['add_user'])) {
    $User = new User();
    $User->addUser();
    header('Location: /data/admin/resours/foydalanuvchilar/User.php');
} elseif (isset($_REQUEST['delete'])) {
    $User = new User();
    $User->deleteUser($id);
    header('Location: /admin/resours/foydalanuvchilar/User.php');
} elseif (isset($_REQUEST['updatePage'])) {
    $User = new User();
    $results = $User->getAllUser($id);
    header("Location: /admin/resours/foydalanuvchilar/updateUser.php?" . http_build_query
        ($results, 'data'));
//    header("Location: /admin/resours/category/updateCategory.php?".http_build_query($results));
} elseif (isset($_REQUEST['sendUpdatedData1'])) {
    $User = new User();
    $results = $User->updateUser($id, $cat_name);
    header('Location: /data/admin/resours/foydalanuvchilar/User.php');
}

