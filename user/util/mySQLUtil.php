<?php
class mySQLUtil {
    
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private static $conn;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "dathweb";
        if (self::$conn == NULL) {

            $this->connectDB();
        }
        return self::$conn;
    }

    public function __destruct() {
        $this->servername = "";
        $this->username = "";
        $this->password = "";
        $this->dbname = "";
        self::$conn = NULL;
    }

    private function connectDB() {
        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function disconnectDB() {

        self::$conn = NULL;
    }

    public function insertData($sql, $param = array()) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($param);
    }

    public function getAllData($sql) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($sql, $param = array()) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteData($sql, $param = array()) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($param);
        return $stmt->rowCount();
    }
    public function updateData($sql, $param = array()) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($param);
        return $stmt->rowCount();
    }

}
