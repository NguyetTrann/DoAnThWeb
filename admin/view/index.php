<?php
session_start();
print_r($_SESSION);
if(!isset($_SESSION["username"])){
    header('Location: ./login.php');
}
else{
    header('Location: ./view/admin.php');
}
?>