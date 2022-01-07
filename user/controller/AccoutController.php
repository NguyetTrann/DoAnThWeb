<?php 
session_start();
function checkPassword($password){
    foreach ($_SESSION['user'] as $key => $value) {
        if ($password==$value['password']) {
            return true;
        }
    }
    return false;
}
function updatePassword($password,$newpassword){
    foreach ($_SESSION['user'] as $key => $value) {
        if ($password==$value['password']) {
            $value['password']=$newpassword;
        }
    }
}
$btn_update=$_POST['btn_update'];
if(isset($_POST)>0){
    if ($btn_update=='update_info') {
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        header('Location:../views/my-account.php');
    }
    else if ($btn_update=='update_password') {
        $password=$_POST['password'];
        $newpassword=$_POST['newpassword'];
        $confirmpassword=$_POST['confirmpassword'];
        if (checkPassword($password)) {
            if ($newpassword==$confirmpassword) {
                updatePassword($password,$newpassword);
            }
        }
        header('Location:../views/my-account.php');
    }else
    header('Location:../views/my-account.php');
}
?>