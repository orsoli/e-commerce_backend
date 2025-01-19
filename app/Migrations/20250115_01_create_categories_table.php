<?php
class CreateCategoriesTable {

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

        // Create the categories table
        $sql = "CREATE TABLE IF NOT EXISTS categories (
            name VARCHAR(255) NOT NULL PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table categories created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        // Drop the categories table
        $sql = "DROP TABLE IF EXISTS categories";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table categories dropped successfully.\n";
    }
}
?>