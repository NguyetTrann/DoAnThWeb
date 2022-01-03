<?php
include "./autoload.php";
include "../dao/ProductDAO.php";
include "../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $ma = $_GET['masp'];
            ProductDAO::deleteProduct($ma, $conn);
            header("Location: ../qlsp.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {        
        case "addsanpham":
            $ten = $_POST['tensp'];
            $gia = $_POST['gia'];
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
                $sanpham = new SanPham($ma, $ten, $imagePath, $gia, $mota);
                ProductDAO::insertProduct($sanpham, $conn);
                header("Location: ../qlsp.php");
            }
            break;
        case "updateSP":
            $ten = $_POST['tensp'];
            $gia = $_POST['gia'];
            $hinh = $_FILES['hinh'];
            $masp = $_POST['masp'];
            if (!empty($hinh['name']))
                $error = validate::validateProduct($ten, $hinh, $gia);                
            else
                $error = validate::validateProductWithoutImage($tensp, $gia);
           
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../editsp.php?masp=$masp");
            } else {
                if (!empty($hinh['name'])) {
                    $temp = $hinh["tmp_name"];
                    $name = $hinh["name"];
                    $oldProduct =  ProductDAO::getProduct($masp, $conn);
                    unlink(dirname(__DIR__) . '/view' . $oldProduct['hinh']);
                    move_uploaded_file($temp, dirname(__DIR__) . '/assets/images/' . $name);
                    $imagePath = '/images/' . $name;
                
                    $sanpham = new SanPham($masp, $ten, $imagePath, $gia);  
                    ProductDAO::updateProduct($sanpham, $masp, $conn);
                    header("Location: ../qlsp.php");
                } else {
                    $sanpham = new SanPham($masp, $ten, $imagePath, $gia);
                    ProductDAO::updateProductWithoutImage($sanpham, $masp, $conn);
                    header("Location: ../qlsp.php");
                }
            }
            break;
    }
}
