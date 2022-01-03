<?php
class validate{
    public static function validateEmail($email){
        $error="";
        if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)==false){
            $error="Sai email!";
            return $error;
        }
        return $error;
    }

    public static function validateProduct($ten,$hinh,$gia){
        $imageType=array("image/png", "image/jpeg", "image/bmp");
        $error="";
        if(empty($hinh))
        $error.="Chưa thêm hình! <br>";
        else if($hinh["error"]!=0)
        $error.="Lỗi file hình! <br>";
        else if(!in_array($hinh["type"],$imageType))
        $error.="Không phải file hình! <br>";
        if(empty($ten))
        $error.="Chưa điền tên sản phẩm! <br>";
        if(empty($gia))
        $error.="Chưa điền giá! <br>";
        return $error;
    }

    public static function validateProductWithoutImage($ten,$gia){
        $error="";
        if(empty($ten))
        $error.="Chưa điền tên sản phẩm! <br>";
        if(empty($gia))
        $error.="Chưa điền giá! <br>";
        return $error;
    }

}