<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 3/1/20
 * Time: 8:55 PM
 */
class Database{
    public $conn;
    public function __construct(){
        $servername = "localhost";
        $dbname = "user";
        $username = "root";
        $password = "root";
        try{
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function prepare($prepare){
        return $this->conn->prepare($prepare);
    }
}