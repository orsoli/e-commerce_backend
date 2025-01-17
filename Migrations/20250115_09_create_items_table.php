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

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'items'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m ! - items table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE items (
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

        // Check if the table does not exist
        $sql = "SHOW TABLES LIKE 'items'";
        $result = $this->conn->query($sql);
        // Check if result is empty
        if($result->rowCount() == 0) {
            echo "\033[33m ! - items table does not exist\033[0m\n";
            return;
        }

        $sql = "DROP TABLE items";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table items dropped successfully.\n";
    }
}