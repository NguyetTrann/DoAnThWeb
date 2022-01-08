<?php
include "./autoload.php";
include "../dao/UserDAO.php";
include "../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $ma = $_GET['makh'];
            UserDAO::deleteUser($ma, $conn);
            header("Location: ../admin.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "update":
            $ten = $_POST['username'];
            $ma = $_POST['makh'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];
            $hinh = $_FILES['hinh'];

            if (!empty($hinh['name'])){
                $error = validate::validateUser($ten,$hinh,$sdt,$email,$password);                   
            }         
            else{
                $error = validate::validateUserWithoutImage($ten,$sdt,$email,$password);
            }
                       
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/edituser.php?makh=$ma");
            } else {
            if (!empty($hinh['name'])) {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                $oldAvatar =  UserDAO::get1User($ma, $conn);
                unlink(dirname(__DIR__) . '/view/assets' . $oldAvatar['hinh']);
                move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                $user = new KhachHang($ma,$ten,$email,$password,$sdt,$imagePath);
                UserDAO::updateUser($user,$ma,$conn);
                header("Location: ../view/admin.php");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                $oldAvatar =  UserDAO::get1User($ma, $conn);
                unlink(dirname(__DIR__) . '/view' . $oldAvatar['hinh']);
                move_uploaded_file($temp, dirname(__DIR__) . '/view/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                $user = new KhachHang($ma,$ten,$email,$password,$sdt,$imagePath);
                UserDAO::updateWithoutUser($user,$ma,$conn);
                header("Location: ../view/admin.php");
            }          
            break;
        }  
    }
}
