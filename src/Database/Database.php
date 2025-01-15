<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    private $conn;

    public function __construct($host, $name, $user, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$name", $user, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
    }

    public function getConnection(): PDO {
        return $this->conn;
    }
}
?>