<?php

//var_dump($_POST);die();
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/17/2020
 * Time: 11:02 PM
 */

require 'DataConnection.php';   // DataConnection fayilini chaqirish

class Auth extends DataConnection  // DataConnection dan meros olish
{

    public static function insertUser()
    {
        try {
            $con = self::get();  // baza bilan ulash uchun  qodi
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // oshibkalani tutib olish uchun
            $username = $_POST['username']; // input polyaladan kelgan malumotlar
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            $fio = $_POST['fio'];
            $role = 1;
            $sql = "INSERT INTO user (username, password, mail,fio,role)   // sql kodi : malumotlarni bazaga yuklash uchun
    VALUES ('$username','$password','$mail','$fio','$role')";
            $con->exec($sql);   // bajarish uchun
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        header("Location: ../index.php"); // hammasini bajargandan keyin header funksiyasi index.php fayligia o'tkazib yuboradi
//
    }


}

Auth::insertUser();  // yaratilgan funksiyani ishlatish uchun.

//var_dump(Auth::getAuth());//die();
//$results = Auth::getAuth();

?>