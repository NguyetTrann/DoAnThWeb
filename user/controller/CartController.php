<?php
    include_once '../util/mySQLUtil.php';
    include_once '../model/Product.php';

    session_start();
    $masp =isset($_GET["masp"])?$_GET["masp"]:'';
    if($masp!=""){
        if(isset($_SESSION['cart'][$masp]))
        {   
            if(isset($_GET["btn_qty"])){
                if ($_GET["btn_qty"]==0) {
                    unset($_SESSION['cart'][$masp]);
                    header("Location:../views/cart.php");
                    exit();
                }
                else{
                    $_SESSION['cart'][$masp]['qty_value']=$_SESSION['cart'][$masp]['qty_value']+$_GET["btn_qty"];
                    $_SESSION['toast']="Thêm ".$_SESSION['cart'][$masp]['name']." thành công";
                    if ( $_SESSION['cart'][$masp]['qty_value']<=0) {
                        $_SESSION['cart'][$masp]['qty_value']=0;
                        unset($_SESSION['cart'][$masp]);
                    }
                }
            }else{
                $_SESSION['cart'][$masp]['qty_value']=$_SESSION['cart'][$masp]['qty_value']+1;
                $_SESSION['toast']="Thêm ".$_SESSION['cart'][$masp]['name']." thành công";
            }
        }
        else
        {
            $product = getSanPhamByMa($masp);
            $_SESSION['cart'][$id]['img']=$product->get_hinh();
            $_SESSION['cart'][$id]['name']=$product->get_tensp();
            $_SESSION['cart'][$id]['price']=$product->get_gia();
            $_SESSION['cart'][$id]['qty_value']=1;
            $_SESSION['toast']="Thêm ".$_SESSION['cart'][$id]['name']." thành công";
        }
    }
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    header("location: javascript://history.go(-1)");
    function getSanPhamByMa($masp){
        $db = new mySQLUtil();
        $query = "SELECT * FROM sanpham WHERE ma_sp = :ma_sp";
        $params = array(":ma_sp"=>$masp);
        $result = $db->getData($query, $params);
        $row = $result[0];
        $product = new Product($row['ma_sp'],$row['ten_sp'],$row['soluong'],$row['gia'],$row['hinh'],$row['ma_dm']);
        return $product;
    }
?>