<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/24/2020
 * Time: 11:15 PM
 */
declare(strict_types=1);
require 'DataConnection.php';

if (isset($_REQUEST['delete_id'])) {
    $id = intval($_REQUEST['delete_id']);
}

class Post extends DataConnection
{
    public $connection;
    public function addPost()
    {

        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_post']) and $_FILES['image']) {

                $title = $_REQUEST['title'];
                $sub_title = $_REQUEST['sub_title'];
                $full_text = $_REQUEST['full_text'];
                $created_at = $_REQUEST['created_at'];
                $seen = $_REQUEST['seen'];
                $created_by = $_REQUEST['created_by'];
                $cat_id = $_REQUEST['cat_id'];

                $image_name = $_FILES['image']['name'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_size = $_FILES['image']['size'];
                define('SITE_ROOT', realpath(dirname(__FILE__)));

                $target_dir = SITE_ROOT . '../../uploads/';
                $target_file = $target_dir . basename($image_name);
                move_uploaded_file($image_tmp_name, $target_file);

                $sql = "INSERT INTO post ( title,sub_title,full_text,created_at,image,seen,created_by,cat_id ) VALUES ( :title,:sub_title,:full_text,:created_at,:image,:seen,:created_by,:cat_id )";

                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':title', $title);
                $smtm->bindParam(':sub_title', $sub_title);
                $smtm->bindParam(':full_text', $full_text);
                $smtm->bindParam(':created_at', $created_at);
                $smtm->bindParam(':created_by', $created_by);
                $smtm->bindParam(':image', $image_name);
                $smtm->bindParam(':seen', $seen);
                $smtm->bindParam(':cat_id', $cat_id);

                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


    }

    public function getAllPost()
    {

        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM post");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deletePost($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $image_name = $this->findPost($id);
            define('SITE_ROOT', realpath(dirname(__FILE__)));
            $target_dir = SITE_ROOT . '../../uploads/';
            $target_file = $target_dir . basename($image_name['image']);
            $sql = "DELETE FROM post WHERE id=$id";
            $this->connection->exec($sql);
            unlink($target_file);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    public function findPost($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM post WHERE id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
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


    public function updatePost($id)
    {
        try {

            $this->connection = self::get();
            $sql = "UPDATE post SET title = :title,sub_title = :sub_title, full_text = :full_text, created_at = :created_at,image = :image,seen = :seen,created_by = :created_by,cat_id = :cat_id WHERE id = :id";
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare($sql);

            $title = $_REQUEST['title'];
            $sub_title = $_REQUEST['sub_title'];
            $full_text = $_REQUEST['full_text'];
            $seen = $_REQUEST['seen'];
            $created_at = $_REQUEST['created_at'];
            $created_by = $_REQUEST['created_by'];
            $cat_id = $_REQUEST['cat_id'];

            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];
            define('SITE_ROOT', realpath(dirname(__FILE__)));

            $target_dir = SITE_ROOT . '../../uploads/';
            $target_file = $target_dir . basename($image_name);
            move_uploaded_file($image_tmp_name, $target_file);

            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':sub_title', $sub_title);
            $stmt->bindValue(':full_text', $full_text);
            $stmt->bindValue(':created_at', $created_at);
            $stmt->bindValue(':image', $image_name);
            $stmt->bindValue(':seen', $seen);
            $stmt->bindValue(':created_by', $created_by);
            $stmt->bindValue(':cat_id', $cat_id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo '' . "<br>" . $e->getMessage();
        }
    }
    public function findUser($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM user WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function findCatName($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM category WHERE id = $id";
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


if (isset($_REQUEST['add_post'])) {
    $Post = new Post();
    $Post->addPost();
    header('Location: /admin/resours/post/post.php');

} elseif (isset($_REQUEST['delete_id'])) {
    $Post = new Post();
    $Post->deletePost($id);
    header('Location: /admin/resours/post/post.php');
}elseif (isset($_REQUEST['updatePost'])){
    $id = $_REQUEST['updatePost'];
    $Post = new Post();
    $Post->updatePost($id);
    header('Location: /admin/resours/post/post.php');
}