<?php
include "./autoload.php";
include "../dao/AdminDAO.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "logout":
            session_start();
            if (isset($_SESSION)) {
                session_unset();
                session_destroy();
                header("Location: ../index.php");
            }
            break;
        case "delete":
            $ma = $_GET['ma'];
            AdminDAO::deleteAdmin($ma, $conn);
            header("Location: ../qlnv.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "login":
            $username = $_POST['username'];
            $password = $_POST['password'];
            // var_dump($_POST);
            // exit();
            $error = "";
            $adminDB = AdminDAO::getAdmin($username, ($password), $conn);
            if ($adminDB == false) {
                session_start();
                $error = "Sai tài khoản hoặc mật khẩu";
                $_SESSION["error"] = $error;

                header("Location: ../login.php");
            } else {
                session_start();
                $_SESSION["error"] = "";
                $ma = $adminDB['ma'];
                $username = $adminDB['username'];
                $email = $adminDB['email'];
                $password = $adminDB['password'];
                $sdt = $adminDB['sdt'];
                $avatar = $adminDB['avatar'];
                $user = new Admin($ma, $username, $email, $password, $sdt, $avatar);
                $_SESSION["admin"] = $user;
                header("Location: ../admin.php");
            }
            break;
        case "addnhanvien":
            $ten = $_POST['username'];
            $ma = $_POST['ma'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];
            $hinh = $_FILES['hinh'];
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../qlsp.php");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                if (!is_dir(dirname(__DIR__) . '/assets/images/')) {
                    mkdir(dirname(__DIR__) . '/assets/images/');
                }
                move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                
                $user = new Admin($ma, $ten, $email, $password, $sdt, $imagePath);
                AdminDAO::insertAdmin($user, $conn);
                header("Location: ../qlnv.php");
            }
            break;
        case "update":
            $ten = $_POST['username'];
            $ma = $_POST['ma'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];
            $hinh = $_FILES['hinh'];
            if (!empty($hinh['name'])) {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                $oldAvatar =  AdminDAO::get1Admin($ma, $conn);
                // unlink(dirname(__DIR__) . '/view' . $oldAvatar['hinh']);
                move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                $user = new Admin($ma, $ten, $email, $password, $sdt, $imagePath);
                AdminDAO::updateAdmin($user, $ma, $conn);
                header("Location: ../qlnv.php");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                $oldAvatar =  UserDAO::get1User($ma, $conn);
                // unlink(dirname(__DIR__) . '/view' . $oldAvatar['hinh']);
                move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                $imagePath = '/images/' . $name;
                $user = new Admin($ma, $ten, $email, $password, $sdt, $imagePath);
                AdminDAO::updateWithoutAdmin($user, $ma, $conn);
                header("Location: ../qlnv.php");
            }
            break;
    }
}
