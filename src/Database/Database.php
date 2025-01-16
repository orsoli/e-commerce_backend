<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    private ?PDO $conn = null;

    /**
     * Database constructor
     */
    public function __construct($host, $port, $name, $user, $password) {
    
        try {
            // Create an Instance of PDO
            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "\033[32m - DB Connected successfully\033[0m\n";
            
        } catch(PDOException $e) {

            echo "\033[31m - DB Connection failed: \033[0m\n" . $e->getMessage();

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