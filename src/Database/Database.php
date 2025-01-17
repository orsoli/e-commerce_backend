<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    private ?PDO $conn = null;
    private $dbconfig;

    /**
     * Database constructor
     */
    public function __construct() {
        // DB config from .env
        $this->dbconfig = [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'name' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
        ];
    

        try {
            // Create an Instance of PDO with .env values database config
            $this->conn = new PDO("mysql:host={$this->dbconfig['host']};port={$this->dbconfig['port']};dbname={$this->dbconfig['name']}", $this->dbconfig['user'], $this->dbconfig['password']);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "\033[32m \u{2714} DB Connected successfully\033[0m\n";
            
        } catch(PDOException $e) {

            echo "\033[31m X DB Connection failed: {$e->getMessage()}\033[0m\n";

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