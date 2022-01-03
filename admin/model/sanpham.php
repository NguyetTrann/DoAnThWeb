<?php
class SanPham
{
    private $masp;
    private $tensp;
    private $hinh;
    private $gia;


    public function __construct($ma, $ten, $hinh, $gia)
    {
        $this->masp = $ma;
        $this->tensp = $ten;
        $this->hinh = $hinh;
        $this->gia = $gia;
    }

    public function setMaSp($ma){
        $this->masp = $ma;
    }

    public function getMaSp(){
        return $this->masp;
    }

    public function setTenSp($ten){
        $this->tensp = $ten;
    }

    public function getTenSp(){
        return $this->tensp;
    }

    public function setHinh($hinh){
        $this->hinh = $hinh;
    }

    public function getHinh(){
        return $this->hinh;
    }

    public function setGia($gia){
        $this->gia = $gia;
    }

    public function getGia(){
        return $this->gia;
    }
}
?>