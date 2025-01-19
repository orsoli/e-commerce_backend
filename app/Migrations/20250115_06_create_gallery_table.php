<?php
class CreateGalleryTable {

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
        $sql = "CREATE TABLE IF NOT EXISTS gallery (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            product_id VARCHAR(255) NOT NULL,
            url TEXT NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table gallery created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        // Drop the table
        $sql = "DROP TABLE IF EXISTS gallery";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table gallery dropped successfully.\n";
    }
}