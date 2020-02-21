<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/21/2020
 * Time: 12:39 PM
 */

require 'DataConnection.php';

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
}


if (isset($_REQUEST['category']))
{   $Category = new Category();
    $Category->addCategory();
    header('Location: /admin');
}else{
    header('Location: /admin/resours/category/addCategory.php');
}

