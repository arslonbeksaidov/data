<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/19/2020
 * Time: 11:09 PM
 */

//require 'DataConnection.php';
//session_start();
require_once 'MyAutoloader.php';
class Login extends DataConnection
{
    public static function getAuth()
    {
        $username = $_POST['username'];

        $password = md5($_POST['password'].'data_uchun') ;
        $con = self::get();
        $sql = "SELECT user.id, user.username, user.password, user.mail, user.fio, user.role FROM user as user WHERE username = '$username' AND password = '$password'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $value) {
            $_SESSION['fio'] = $value['fio'];
            $_SESSION['username'] = $value['username'];
            $_SESSION['role'] = $value['role'];
            $_SESSION['user_id'] = $value['id'];
            $time = time();
            $_SESSION['time'] = $time;
        }
        if ($_SESSION['role'] == 1 and $_SESSION['username']) {
            header("Location: /admin/index.php");
        } else {
            header("location: ../resours/errorLogin.php");
        }


    }



}

if ($_REQUEST['login'] === 'login'){
    Login::getAuth();
}
