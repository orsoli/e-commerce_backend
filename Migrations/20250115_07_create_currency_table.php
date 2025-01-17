<?php
class CreateCurrencyTable {

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
        $sql = "CREATE TABLE IF NOT EXISTS currency (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            label VARCHAR(255) NOT NULL,
            symbol VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table currency created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        // Drop the table
        $sql = "DROP TABLE IF EXISTS currency";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table currency dropped successfully.\n";
    }
}