<?php
include dirname(__DIR__)."/util/connectDB.php";
class AdminDAO
{
    public static function getAdmin($username, $pass, $conn)
    {
        $statement = $conn->prepare("select * from admin where (username='$username')  and password='$pass'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function get1Admin($ma,$conn){
        $statement=$conn->prepare("select * from admin where ma=$ma");
        $statement->execute();
        $user=$statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAdminWithEmail($email,$conn)
    {
        $statement = $conn->prepare("select * from admin where email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAllAdmin($conn)
    {
        $statement = $conn->prepare("select * from admin");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public static function insertAdmin($admin,$conn)
    {
        $statement = $conn->prepare("insert into admin(username,email,sdt,password,avatar) values(:username,:email,:sdt,:password,:avatar)");
        $statement->bindValue(':email',$admin->get_Email());
        $statement->bindValue(':username',$admin->get_username());
        $statement->bindValue(':password',$admin->get_Password());
        $statement->bindValue(':sdt',$admin->get_Sdt());
        $statement->bindValue(':avatar',$admin->get_Avatar());
        $statement->execute();
    }

    public static function insertWithoutAvtAdmin($admin,$conn)
    {
        $statement = $conn->prepare("insert into admin(username,email,sdt,password) values(:username,:email,:sdt,:password)");
        $statement->bindValue(':email',$admin->get_Email());
        $statement->bindValue(':username',$admin->get_username());
        $statement->bindValue(':password',$admin->get_Password());
        $statement->bindValue(':sdt',$admin->get_Sdt());
        $statement->execute();
    }

    public static function updateAdmin($admin,$ma,$conn){
        $statement = $conn->prepare("update admin set username=:username,email=:email,sdt=:sdt,password=:password,avatar=:avatar where ma=:ma");
        $statement->bindValue(':email',$admin->get_Email());
        $statement->bindValue(':username',$admin->get_username());
        $statement->bindValue(':password',$admin->get_Password());
        $statement->bindValue(':sdt',$admin->get_Sdt());
        $statement->bindValue(':avatar',$admin->get_Avatar());
        $statement->bindValue(':ma',$ma);
        $statement->execute();
    }

    public static function updateWithoutAdmin($admin,$ma,$conn){
        $statement = $conn->prepare("update admin set username=:username,email=:email,sdt=:sdt,password=:password where ma=:ma");
        $statement->bindValue(':email',$admin->get_Email());
        $statement->bindValue(':username',$admin->get_username());
        $statement->bindValue(':password',$admin->get_Password());
        $statement->bindValue(':sdt',$admin->get_Sdt());
        $statement->bindValue(':ma',$ma);
        $statement->execute();
    }

    public static function deleteAdmin($ma,$conn){
        $statement = $conn->prepare("delete from admin where ma = $ma");
        $statement->execute();
    }

}

?>