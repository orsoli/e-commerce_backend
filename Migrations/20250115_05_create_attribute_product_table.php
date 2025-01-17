<?php
class CreateAttributeProductTable {

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

        // Create the table with foreign keys
        $sql = "CREATE TABLE IF NOT EXISTS attribute_product (
            id BIGINT NOT NULL PRIMARY KEY,
            product_id VARCHAR(255) NOT NULL,
            attribute_id VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (product_id) REFERENCES products(id),
            FOREIGN KEY (attribute_id) REFERENCES attributes(id)
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table attribute_product created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        // Drop the table
        $sql = "DROP TABLE IF EXISTS attribute_product";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table attribute_product dropped successfully.\n";
    }
}