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
            echo "Connected successfully       <p class='success'>Done</p> \n";
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