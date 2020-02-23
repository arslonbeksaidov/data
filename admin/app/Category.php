<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/21/2020
 * Time: 12:39 PM
 */

require 'DataConnection.php';

if (isset($_REQUEST['delete'])) {
    $id = intval($_REQUEST['delete']);
} elseif (isset($_REQUEST['updatePage'])) {
    $id = intval($_REQUEST['updatePage']);
} elseif (isset($_REQUEST['sendUpdatedData'])) {
    $id = intval($_REQUEST['sendUpdatedData']);
    $cat_name = addslashes($_REQUEST['cat_name']);
//        var_dump($id);die();
}

class Category extends DataConnection
{
    public $connection;

    public function addCategory()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_category'])) {

                $cat_name = addslashes($_POST['cat_name']);
//                var_dump($cat_name);die();
                $sql = "INSERT INTO category ( name ) VALUES ( :name )";
                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':name', $cat_name);
                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


    }

    function getAllCategory()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT id, name FROM category");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function deleteCategory($id)
    {
        try {
            $this->connection = self::get();
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM category WHERE id=$id";

            // use exec() because no results are returned
            $this->connection->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    function updateCategory($id, $cat_name)
    {
        try {

            $this->connection = self::get();
            $sql = "UPDATE category SET name = :name WHERE id = :id";
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':name', $cat_name);
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
            $sql = "SELECT id, name FROM category WHERE id = $id";
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


if (isset($_REQUEST['add_category'])) {
    $Category = new Category();
    $Category->addCategory();
    header('Location: /admin/resours/category/category.php');
} elseif (isset($_REQUEST['delete'])) {
    $Category = new Category();
    $Category->deleteCategory($id);
    header('Location: /admin/resours/category/category.php');
} elseif (isset($_REQUEST['updatePage'])) {
    $Category = new Category();
    $results = $Category->getAllCategory($id);
    header("Location: /admin/resours/category/updateCategory.php?" . http_build_query($results, 'data'));
//    header("Location: /admin/resours/category/updateCategory.php?".http_build_query($results));
} elseif (isset($_REQUEST['sendUpdatedData'])) {
    $Category = new Category();
    $results = $Category->updateCategory($id, $cat_name);
    header('Location: /admin/resours/category/category.php');
}

