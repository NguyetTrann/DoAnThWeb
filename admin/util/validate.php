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

    public static function validateProduct($ten,$hinh,$gia,$mota){
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
        if(empty($mota))
        $error.="Chưa điền mô tả! <br>";
        return $error;
    }

    public static function validateProductWithoutImage($ten,$gia,$mota){
        $error="";
        if(empty($ten))
        $error.="Chưa điền tên sản phẩm! <br>";
        if(empty($gia))
        $error.="Chưa điền giá! <br>";
        if(empty($mota))
        $error.="Chưa điền mô tả! <br>";
        return $error;
    }

    public static function validateAdmin($ten,$avatar,$username,$email,$password){
        $imageType=array("image/png", "image/jpeg", "image/bmp");
        $error="";
        if(empty($avatar))
        $error.="Chưa thêm hình! <br>";
        else if($avatar["error"]!=0)
        $error.="Lỗi file hình! <br>";
        else if(!in_array($avatar["type"],$imageType))
        $error.="Không phải file hình! <br>";
        if(empty($ten))
        $error.="Chưa điền tên nhân viên! <br>";
        if(empty($username))
        $error.="Chưa điền username! <br>";
        if(empty($email))
        $error.="Chưa điền email! <br>";
        if(empty($password))
        $error.="Chưa điền password! <br>";
        return $error;
    }

    public static function validateAdminWithoutImage($ten,$username,$email,$password){
        $error="";
        if(empty($ten))
        $error.="Chưa điền tên nhân viên! <br>";
        if(empty($username))
        $error.="Chưa điền username! <br>";
        if(empty($email))
        $error.="Chưa điền email! <br>";
        if(empty($password))
        $error.="Chưa điền password! <br>";
        return $error;
    }

    public static function validateUser($ten,$avatar,$sdt,$email,$password){
        $imageType=array("image/png", "image/jpeg", "image/bmp");
        $error="";
        if(empty($avatar))
        $error.="Chưa thêm hình! <br>";
        else if($avatar["error"]!=0)
        $error.="Lỗi file hình! <br>";
        else if(!in_array($avatar["type"],$imageType))
        $error.="Không phải file hình! <br>";
        if(empty($ten))
        $error.="Chưa điền tên khách hàng! <br>";
        if(empty($sdt))
        $error.="Chưa điền số điện thoại! <br>";
        if(empty($email))
        $error.="Chưa điền email! <br>";
        if(empty($password))
        $error.="Chưa điền password! <br>";
        return $error;
    }

    public static function validateUserWithoutImage($ten,$sdt,$email,$password){
        $error="";
        if(empty($ten))
        $error.="Chưa điền tên khách hàng! <br>";
        if(empty($sdt))
        $error.="Chưa điền số điện thoại! <br>";
        if(empty($email))
        $error.="Chưa điền email! <br>";
        if(empty($password))
        $error.="Chưa điền password! <br>";
        return $error;
    }

}