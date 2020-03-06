<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/24/2020
 * Time: 11:15 PM
 */
declare(strict_types=1);
//require 'DataConnection.php';
require_once 'MyAutoloader.php';
if (isset($_REQUEST['delete_id'])) {
    $id = intval($_REQUEST['delete_id']);
}
$dataConnection = new DataConnection();
class Post extends DataConnection
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

    /* yangilik qo'shish*/
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

    /* hamma yangiliklarni olish */
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

    /* id boyicha shu id ni o'chirish*/
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

    /* id boyicha shu id dagi yangilikni olish*/
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

    /* id boyicha jamo azosini malumotlarini olish*/
    public function findTeamMemeber($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM team WHERE id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function findGalleryItem($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM galery WHERE id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function findGalleryItems($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM galery WHERE id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* hamma kategoriyalarni olish*/
    public function getAllCategory()
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

    /* yangiliklarni yangilash*/
    public function updatePost($id, $image_name)
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

    /* id boyicha shu id dagi foydalanuvchini malumotlarini olish*/
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

    /* id boyicha kategoriyani olish*/
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

    /* ohirgi 3 ta yangilikni chiqarish*/
    public function getLatestPost()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM post ORDER by id DESC LIMIT 3");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /*  gallereya yaratish uchun funksiya   */

    public function createGallery()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_gallery']) and $_FILES['imageGallery']) {

                $info = $_REQUEST['info'];
                $category = $_REQUEST['category'];



                $image_name = $_FILES['imageGallery']['name'];
                $image_tmp_name = $_FILES['imageGallery']['tmp_name'];
                $image_size = $_FILES['imageGallery']['size'];
                define('SITE_ROOT', realpath(dirname(__FILE__)));

                $target_dir = SITE_ROOT . '../../gallery_photo/';
                $target_file = $target_dir . basename($image_name);
                move_uploaded_file($image_tmp_name, $target_file);

                $sql = "INSERT INTO galery ( image,category,info) VALUES ( :image,:category,:info)";

                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':info', $info);
                $smtm->bindParam(':image', $image_name);
                $smtm->bindParam(':category', $category);


                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

    }


    /* yaratish team info  */

    public function createTeamInfo()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_team_info']) and $_FILES['imageTeam']) {

                $name = $_REQUEST['name'];
                $position = $_REQUEST['position'];
                $title = $_REQUEST['title'];
                $sub_title = $_REQUEST['sub_title'];
                $insta = $_REQUEST['insta'];
                $tel = $_REQUEST['tel'];


                $image_name = $_FILES['imageTeam']['name'];
                $image_tmp_name = $_FILES['imageTeam']['tmp_name'];
                $image_size = $_FILES['imageTeam']['size'];
                define('SITE_ROOT', realpath(dirname(__FILE__)));

                $target_dir = SITE_ROOT . '../../team_photo/';
                $target_file = $target_dir . basename($image_name);
                move_uploaded_file($image_tmp_name, $target_file);

                $sql = "INSERT INTO team ( name,position,title,sub_title,insta,tel,image) VALUES ( :name,:position,:title,:sub_title,:insta,:tel,:image )";

                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':name', $name);
                $smtm->bindParam(':position', $position);
                $smtm->bindParam(':title', $title);
                $smtm->bindParam(':sub_title', $sub_title);
                $smtm->bindParam(':insta', $insta);
                $smtm->bindParam(':tel', $tel);
                $smtm->bindParam(':image', $image_name);

                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

    }

    /*  team malumotlarini chiqarish  */
    public function getAllTeam()
    {

        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM team");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* delete Team*/

    public function deleteTeam($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $image_name = $this->findTeamMemeber($id);
            define('SITE_ROOT', realpath(dirname(__FILE__)));
            $target_dir = SITE_ROOT . '../../team_photo/';
            $target_file = $target_dir . basename($image_name['image']);
            $sql = "DELETE FROM team WHERE id=$id";
            $this->connection->exec($sql);
            unlink($target_file);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function getAllGalleryCategory()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT id, name FROM categorygallery");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteGallery($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $image_name = $this->findGalleryItem($id);
            define('SITE_ROOT', realpath(dirname(__FILE__)));
            $target_dir = SITE_ROOT . '../../gallery_photo/';
            $target_file = $target_dir . basename($image_name['image']);
            $sql = "DELETE FROM galery WHERE id=$id";
            $this->connection->exec($sql);
            unlink($target_file);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function getAllGallery()
    {

        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM galery");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* berilgan id boyicha gallereya kategoriya malumotlarini topish */

    public function findGalleryCatName($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM categorygallery WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            return $result;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function findGalleryCatNameDistinct($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT DISTINCT * FROM categorygallery WHERE id = $id";
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

} elseif (isset($_REQUEST['updatePost']) and !empty($_FILES['image']['name'])) {


//    var_dump(empty($_FILES['image']['name']));die();

    $id = $_REQUEST['updatePost'];
    $image_name = $_FILES['image']['name'];
    $Post = new Post();
    $Post->updatePost($id, $image_name);

    header('Location: /admin/resours/post/post.php');

} elseif (empty($_FILES['image']['name']) and isset($_REQUEST['updatePost'])) {
    $id = $_REQUEST['updatePost'];
    $addImageName = $_REQUEST['addNameImage'];
    $Post = new Post();
    $Post->updatePost($id, $addImageName);
    header('Location: /admin/resours/post/post.php');
} elseif (isset($_REQUEST['add_team_info']) and !empty($_FILES['imageTeam']['name'])) {
    $Post = new Post();
    $Post->createTeamInfo();
    header('Location: /admin/resours/team/team.php');
} elseif (isset($_REQUEST['delete_team_id'])) {
    $id = intval($_REQUEST['delete_team_id']);
    $Post = new Post();
    $Post->deleteTeam($id);
    header('Location: /admin/resours/team/team.php');
}elseif (isset($_REQUEST['add_gallery']))
{
    $Post = new Post();
    $Post->createGallery();
    header('Location: /admin/resours/gallery/gallery.php');
}elseif (isset($_REQUEST['delete_gallery_id'])) {
    $id = intval($_REQUEST['delete_gallery_id']);
    $Post = new Post();
    $Post->deleteGallery($id);
    header('Location: /admin/resours/gallery/gallery.php');
}



