<?php
namespace Core;
use PDO;
use PDOException;


class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {

        $host = "localhost";
        $port = "5432";
        $dbname = "cabinet";
        $user = "postgres";
        $pass = "laragon";
 
        try { 
            
            $this->conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn; 
       
    } 
  
}
  
?>