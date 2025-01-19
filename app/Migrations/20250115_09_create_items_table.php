<?php
class CreateItemsTable {

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
        $sql = "CREATE TABLE IF NOT EXISTS items (
            id VARCHAR(255) NOT NULL PRIMARY KEY,
            attribute_id VARCHAR(255) NOT NULL,
            display_value VARCHAR(255) NOT NULL,
            value VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (attribute_id) REFERENCES attributes(id)
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table items created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        // Drop the table
        $sql = "DROP TABLE IF EXISTS items";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table items dropped successfully.\n";
    }
}