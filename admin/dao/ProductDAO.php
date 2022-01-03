<?php
include dirname(__DIR__)."/util/connectDB.php";

class ProductDAO{
   
    public static function insertProduct($product,$conn){
        $statement = $conn->prepare("insert into sanpham(tensp,hinh,gia)
        values(:tensp,:hinh,:gia)");
        $statement->bindValue(':tensp',$product->getTenSp());
        $statement->bindValue(':hinh',$product->getHinh());
        $statement->bindValue(':gia',$product->getGia());
        $statement->execute();
    }

    public static function updateProduct($product,$masp,$conn){
        $statement = $conn->prepare("update sanpham
        set tensp=:tensp,hinh=:hinh,gia=:gia where masp=:masp");
        $statement->bindValue(':tensp',$product->getTenSp());        
        $statement->bindValue(':hinh',$product->getHinh());
        $statement->bindValue(':gia',$product->getGia());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function updateProductWithoutImage($product,$masp,$conn){
        $statement = $conn->prepare("update sanpham
        set tensp=:tensp,hinh=:hinh,gia=:gia where masp=:masp");
        $statement->bindValue(':tensp',$product->getTenSp());
        $statement->bindValue(':gia',$product->getGia());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function getAllProduct($conn){
        $statement = $conn->prepare("select * from sanpham");
        $statement->execute();
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public static function getProduct($masp,$conn){
        $statement=$conn->prepare("select * from sanpham where masp='$masp'");
        $statement->execute();
        $product=$statement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public static function deleteProduct($masp,$conn){
        $statement=$conn->prepare("delete from sanpham where masp=$masp");
        $statement->execute();
    }
}