<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2/17/2020
 * Time: 11:02 PM
 */


require_once 'MyAutoloader.php';
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
            $user_id = $_POST['id'];


            $sql2 = "INSERT INTO user (username, password, mail, fio, role) VALUES (:username, :password, :mail, :fio, :role)";
            $stmt = $con->prepare($sql2);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',md5($password.'data_uchun'));
            $stmt->bindParam(':mail',$mail);
            $stmt->bindParam(':fio',$fio);
            $stmt->bindParam(':role',$role);
            $stmt->execute();   // bajarish uchun
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

//
    }


}

Auth::insertUser();  // yaratilgan funksiyani ishlatish uchun.
header("Location: /admin/resours/foydalanuvchilar/User.php"); // hammasini bajargandan keyin header funksiyasi index.php fayligia o'tkazib yuboradi
//var_dump(Auth::getAuth());//die();
//$results = Auth::getAuth();

?>