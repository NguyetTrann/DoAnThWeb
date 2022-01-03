<?php

class KhachHang
{
    private $makh;
    private $username;
    private $email;
    private $password;
    private $sdt;
    private $avatar;

    public function __construct($ma, $username, $em, $pw, $std, $avt)
    {
        $this->email = $em;
        $this->makh = $ma;
        $this->password = $pw;
        $this->username = $username;
        $this->sdt = $std;
        $this->avatar = $avt;
    }


    public function set_MaKH($ma){
        $this->makh=$ma;
    }

    public function get_MaKH(){
        return $this->makh;
    }

    public function set_Emai($em){
        $this->email=$em;
    }

    public function get_Email(){
        return $this->email;
    }

    public function set_Password($pw){
        $this->password=$pw;
    }

    public function get_Password(){
        return $this->password;
    }

    public function set_username($username){
        $this->username=$username;
    }

    public function get_username(){
        return $this->username;
    }

    public function set_Sdt($sdt){
        $this->sdt=$sdt;
    }

    public function get_Sdt(){
        return $this->sdt;
    }

    public function set_Avatar($avt){
        $this->avatar=$avt;
    }

    public function get_Avatar(){
        return $this->avatar;
    }
}
