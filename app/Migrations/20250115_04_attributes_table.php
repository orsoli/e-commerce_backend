<?php

class CreatAttributesTable {

     private $conn;

    
    /**
     * 
     * @param $conn
     */
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    /**
     * Run the migrations
     */
    public function up() {

        // Create the table
        $sql = "CREATE TABLE IF NOT EXISTS attributes (
            id VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE KEY,
            type VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table attributes created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        // Drop the table
        $sql = "DROP TABLE IF EXISTS attributes";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table attributes dropped successfully.\n";
    }
}