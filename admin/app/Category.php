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
}

class Category extends DataConnection
{
    public $connection;

    public function addCategory()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['category'])) {

                $cat_name = addslashes($_POST['cat_name']);

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
}


if (isset($_REQUEST['category'])) {
    $Category = new Category();
    $Category->addCategory();
    header('Location: /admin');
} elseif (isset($_REQUEST['delete'])) {

    $Category = new Category();
    $Category->deleteCategory($id);
    header('Location: /admin/resours/category/category.php');
} else {
//    header('Location: /admin/resours/category/category.php');
}

