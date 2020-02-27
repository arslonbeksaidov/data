<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/27/2020
 * Time: 4:33 PM
 */

require_once 'DataConnection.php';

class Message extends DataConnection
{
    public $connection;

    public function addMessage()
    {
        try {
            $this->connection = self::get();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['sendMessage'])) {

                $message = addslashes($_REQUEST['message']);
                $title = addslashes($_REQUEST['title']);
                $mail = addslashes($_REQUEST['mail']);
                $tel_number = addslashes($_REQUEST['tel_number']);
                $isSeen = 0;
//                var_dump($cat_name);die();
                $sql = "INSERT INTO message ( title,message,tel_number,mail,isSeen ) VALUES ( :title,:message,:tel_number,:mail,:isSeen)";
                $smtm = $this->connection->prepare($sql);
                $smtm->bindParam(':title', $title);
                $smtm->bindParam(':message', $message);
                $smtm->bindParam(':tel_number', $tel_number);
                $smtm->bindParam(':mail', $mail);
                $smtm->bindParam(':isSeen', $isSeen);
                $smtm->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}

if (isset($_REQUEST['sendMessage'])){
    $Message = new Message();
    $Message->addMessage();
    header('Location: /public/index.php');
}