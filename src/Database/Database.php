<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    private $conn;

    /**
     * Database constructor
     */
    public function __construct($host, $name, $user, $password) {
        try {
            // Create an Instance of PDO
            $this->conn = new PDO("mysql:host=$host;dbname=$name", $user, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
    }

    /**
     * Get the connection
     */
    public function getConnection(): PDO {
        return $this->conn;
    }
}
?>