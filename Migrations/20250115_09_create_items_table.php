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
            echo "\033[33m - items table already exists\033[0m\n";
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
        echo " - Table items created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        $sql = "DROP TABLE items";
        $this->conn->exec($sql);
        echo "Table items dropped successfully         \033[31mDONE\033[0m\n";
    }
}