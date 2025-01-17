<?php
class CreateProductsTable {

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
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE KEY,
            inStock BOOLEAN NOT NULL,
            description TEXT DEFAULT NULL,
            price DECIMAL(8,2) UNSIGNED,
            category VARCHAR(255),
            brand VARCHAR(255),
            __typename VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (price) REFERENCES prices(amount),
            FOREIGN KEY (category) REFERENCES categories(name)
        )";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table products created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        // Drop the table
        $sql = "DROP TABLE IF EXISTS products";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table products dropped successfully.\n";
    }
}
?>