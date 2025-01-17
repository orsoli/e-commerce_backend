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
            echo "\033[33m - prices table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE prices (
            amount DECIMAL(8,2) UNSIGNED PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
        echo " - Table prices created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        $sql = "DROP TABLE prices";
        $this->conn->exec($sql);
        echo "Table prices dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>