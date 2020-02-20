<?php

//var_dump($_POST);die();
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/17/2020
 * Time: 11:02 PM
 */

require 'DataConnection.php';

class Auth extends DataConnection
{

    public static function insertUser()
    {
        try {
            $con = self::get();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            $fio = $_POST['fio'];
            $role = 1;
            $sql = "INSERT INTO user (username, password, mail,fio,role)
    VALUES ('$username','$password','$mail','$fio','$role')";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        header("Location: ../index.php");
//
    }


}

Auth::insertUser();

//var_dump(Auth::getAuth());//die();
//$results = Auth::getAuth();

?>