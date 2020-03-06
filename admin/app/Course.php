<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 3/5/2020
 * Time: 4:46 PM
 */
require_once 'MyAutoloader.php';
class Course extends DataConnection
{
    public $connection;
    public function addCourse()
    {

        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['add_course'])) {

                $cat_id = addslashes($_POST['cat_id']);
                $text = addslashes($_POST['text']);
//                var_dump($cat_name);die();
                $sql = "INSERT INTO course ( cat_id,text) VALUES ( :cat_id,:text )";
                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':cat_id', $cat_id);
                $smtm->bindParam(':text', $text);

         $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


    }

    function getAllCourse()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM course");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function deleteCourse($id)
    {
        try {
            $this->connection = self::get();
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM course WHERE id=$id";

            // use exec() because no results are returned
            $this->connection->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    public function findCourseText($id)
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->connection->prepare("SELECT * FROM course WHERE cat_id = $id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}
if (isset($_REQUEST['add_course'])) {
    $Category = new Course();
$Category->addCourse();
    header('Location: /admin/resours/displayCourse/displayCourse.php');

}elseif (isset($_REQUEST['delete'])) {
    $Category = new Course();
    $id = intval($_REQUEST['delete']);
    $Category->deleteCourse($id);
    header('Location: /admin/resours/displayCourse/displayCourse.php');

}