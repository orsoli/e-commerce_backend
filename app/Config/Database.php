<?php

namespace App\Config;

use App\Config\Config;
use PDO;
use PDOException;

class Database {
    private ?PDO $conn = null;
    private $config;

    /**
     * Database constructor
     */
    public function __construct() {
        // Load the database connection
        try {
            // Load environment variables
            $this->config = new Config();
            // Create an Instance of PDO with .env values database config
            $this->conn = new PDO("mysql:host={$this->config->get('DB_HOST')};port={$this->config->get('DB_PORT')};dbname={$this->config->get('DB_DATABASE')}", $this->config->get('DB_USERNAME'), $this->config->get('DB_PASSWORD'));
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