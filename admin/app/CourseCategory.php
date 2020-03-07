<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 3/5/2020
 * Time: 4:16 PM
 */
require_once 'DataConnection1.php';
class CourseCategory extends DataConnection1
{
    public $connection;

    public function addCategory()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_category'])) {

                $cat_name = addslashes($_POST['cat_name']);
                $logo = addslashes($_POST['logo']);
//                var_dump($cat_name);die();
                $sql = "INSERT INTO categorycourse ( name,logo ) VALUES ( :name,:logo )";
                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':name', $cat_name);
                $smtm->bindParam(':logo', $logo);
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
            $stmt = $this->connection->prepare("SELECT id, name,logo FROM categorycourse");
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
            $sql = "DELETE FROM categorycourse WHERE id=$id";

            // use exec() because no results are returned
            $this->connection->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function findCourse($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM categorycourse WHERE id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}



if (isset($_REQUEST['add_category'])) {
    $Category = new CourseCategory();

   $Category->addCategory();
    header('Location: /admin/resours/course/course.php');

}elseif (isset($_REQUEST['delete'])) {

    $Category = new CourseCategory();
    $id = intval($_REQUEST['delete']);
    $Category->deleteCategory($id);
    header('Location: /admin/resours/course/course.php');

}