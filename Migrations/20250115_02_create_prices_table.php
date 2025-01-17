<?php
class CreatePricesTable {

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
        $sql = "SHOW TABLES LIKE 'prices'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m ! - prices table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE prices (
            amount DECIMAL(8,2) UNSIGNED PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table prices created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        // Check if the table does not exist
        $sql = "SHOW TABLES LIKE 'prices'";
        $result = $this->conn->query($sql);
        // Check if result is empty
        if($result->rowCount() == 0) {
            echo "\033[33m ! - prices table does not exist\033[0m\n";
            return;
        }

        $sql = "DROP TABLE prices";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table prices dropped successfully.\n";
    }
}
?>