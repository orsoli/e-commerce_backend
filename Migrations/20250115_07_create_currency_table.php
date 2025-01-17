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

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'currency'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m ! - currency table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE currency (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            label VARCHAR(255) NOT NULL,
            symbol VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table carrency created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        // Check if the table does not exist
        $sql = "SHOW TABLES LIKE 'carrency'";
        $result = $this->conn->query($sql);
        // Check if result is empty
        if($result->rowCount() == 0) {
            echo "\033[33m ! - carrency table does not exist\033[0m\n";
            return;
        }

        $sql = "DROP TABLE carrency";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table carrency dropped successfully.\n";
    }
}