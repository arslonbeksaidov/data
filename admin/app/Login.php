<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/19/2020
 * Time: 11:09 PM
 */

require 'DataConnection.php';
session_start();
class Login extends DataConnection
{
    public static function getAuth()
    {
        $username = $_POST['username'];
        $options = [
            'cost' => 12,
        ];
        $password = md5($_POST['password'].'data_uchun') ;
//        var_dump($password);die();
        $con = self::get();
        $sql = "SELECT user.username, user.password, user.mail, user.fio, user.role FROM user as user WHERE username = '$username' AND password = '$password'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $value) {
            $_SESSION['fio'] = $value['fio'];
            $_SESSION['username'] = $value['username'];
            $_SESSION['role'] = $value['role'];
            $time = time();
            $_SESSION['time'] = $time;
        }
//        var_dump($_SESSION);die();
        if ($_SESSION['role'] == 1 and $_SESSION['username']) {
            header("Location: /admin");
        } else {
            header("location: ../resours/errorLogin.php");
        }


    }



}

Login::getAuth();