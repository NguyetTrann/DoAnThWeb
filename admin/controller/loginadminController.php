<?php
include "./autoload.php";
include "../dao/AdminDAO.php";
include "../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "logout":
            session_start();
            if (isset($_SESSION)) {
                session_unset();
                session_destroy();
                header("Location: ../view/index.php");
            }
            break;
        case "delete":
            $ma = $_GET['ma'];
            AdminDAO::deleteAdmin($ma, $conn);
            header("Location: ../view/qlnv.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "login":
            $username = $_POST['username'];
            $password = $_POST['password'];
            $error = "";
            $adminDB = AdminDAO::getAdmin($username, sha1($password), $conn);
            if ($adminDB == false) {
                session_start();
                $error = "Sai tài khoản hoặc mật khẩu";
                $_SESSION["error"] = $error;

                header("Location: ../view/login.php");
            } else {
                session_start();
                $_SESSION["error"] = "";
                $ma = $adminDB['ma'];
                $username = $adminDB['username'];
                $email = $adminDB['email'];
                $ten = $adminDB['tenad'];
                $password = $adminDB['password'];
                $sdt = $adminDB['sdt'];
                $avatar = $adminDB['avatar'];
                $user = new Admin($ma, $username, $ten, $email, $password, $sdt, $avatar);
                $_SESSION["admin"] = $user;
                header("Location: ../view/admin.php");
            }
            break;
        case "addnhanvien":
            $username = $_POST['username'];
            $ten = $_POST['tenad'];
            $ma = $_POST['ma'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];
            $hinh = $_FILES['hinh'];
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/qlsp.php");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                if (!is_dir(dirname(__DIR__) . '/assets/images/')) {
                    mkdir(dirname(__DIR__) . '/assets/images/');
                }
                move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                
                $user = new Admin($ma,$username, $ten, $email, $password, $sdt, $imagePath);
                AdminDAO::insertAdmin($user, $conn);
                header("Location: ../view/qlnv.php");
            }
            break;
        case "update":
            $username = $_POST['username'];
            $ten = $_POST['tenad'];
            $ma = $_POST['ma'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];
            $hinh = $_FILES['hinh'];

            if (!empty($hinh['name'])){
                $error = validate::validateAdmin($ten,$hinh,$username,$email,$password);                   
            }         
            else{
                $error = validate::validateAdminWithoutImage($ten,$username,$email,$password);
            }
                       
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/editadmin.php?ma=$ma");
            } else {
            if (!empty($hinh['name'])) {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                $oldAvatar =  AdminDAO::get1Admin($ma, $conn);
                unlink(dirname(__DIR__) . '/view/assets' . $oldAvatar['hinh']);
                move_uploaded_file($temp, dirname(__DIR__) . '/view/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                $user = new Admin($ma, $ten,$username, $email, sha1($password), $sdt, $imagePath);
                AdminDAO::updateAdmin($user, $ma, $conn);
                header("Location: ../view/qlnv.php");
            } else {
                $user = new Admin($ma, $ten,$username, $email, sha1($password), $sdt, $imagePath);
                AdminDAO::updateWithoutAdmin($user, $ma, $conn);
                header("Location: ../view/qlnv.php");
            }
            break;
        }
    }
}
