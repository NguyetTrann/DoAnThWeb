<?php
include '../util/mySQLUtil.php';
class userModel {
    private $makh;
    private $username;
    private $email;
    private $sdt;
    private $password;
    private $avatar;

    function __construct($makh,$username, $email,$sdt, $password, $avatar) {
        $this->makh = $makh;
        $this->username = $username;
        $this->email = $email;
        $this->sdt = $sdt;
        $this->password = $password;
        $this->avatar = $avatar;
    }

    public function getMakh() {return $this->makh;}
    public function getUsername() {return $this->username;}
    public function getEmail() {return $this->email;}
    public function getSDT() {return $this->sdt;}
    public function getPassword() {return $this->password;}
    public function getAvatar() {return $this->avatar;}

    public function setMakh($makh) {$this->makh = $makh;}
    public function setUsername($username) {$this->username = $username;}
    public function setEmail($email) {$this->email = $email;}
    public function setSDT($sdt) {$this->sdt = $sdt;}
    public function setPassword($password){$this->password = $password;}
    public function setAvatar($avatar) {$this->avatar =$avatar;}

    public function insertUser() {
        $myDB = new mySQLUtil();
        $query = "INSERT INTO `users`(`makh`, `user_name`, `user_email`, `user_password`, `user_sdt`, `user_avatar`) VALUES (null,:name,:email,:sdt,:password,'KH','')";
        $param = array(":name" => $this->getUserName(), ":email" => $this->getEmail(), ":password" => $this->getPassword());
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public function getUser() {
        $myDB = new mySQLUtil();
        $query = "SELECT * FROM `users` WHERE `users`.`makh`=:makh";
        $param = array(":makh" => $this->getMakh());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }

    public function getUserEmail() {
        $myDB = new mySQLUtil();
        $query = "SELECT * FROM `users` WHERE `users`.`user_email`=:email";
        $param = array(":email" => $this->getEmail());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }
    public function getUserSDT() {
        $myDB = new mySQLUtil();
        $query = "SELECT * FROM `users` WHERE `users`.`user_sdt`=:sdt";
        $param = array(":sdt" => $this->getSDT());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function changePassword() {
        $myDB = new mySQLUtil();
        $query = "UPDATE `users` SET `user_password`=:password WHERE `users`.`makh` = :makh";
        $param = array(":makh" => $this->getMakh(), ":password"=>$this->getPassword());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function updateUser() {
        $myDB = new mySQLUtil();
        $query = "UPDATE `users` SET `user_name`= :username,`user_email`= :email,`user_password`=:password,`user_avatar`= :avatar WHERE `users`.`makh` = :makh";
        $param = array(":makh" => $this->getMakh(),":username" => $this->getUsername(), ":email" => $this->getEmail(), ":password"=>$this->getPassword(), ":avatar"=>$this->getAvatar());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function deleteUser() {
        $myDB = new mySQLUtil();
        $query = "DELETE from user  where `users`.`makh`=:users";
        $param = array(":users" => $this->getMakh());
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }


}
?>