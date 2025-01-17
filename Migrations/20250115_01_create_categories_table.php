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
        
        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'categories'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - categories table already exists\033[0m\n";
            return;
        }

        // Create the categories table
        $sql = "CREATE TABLE categories (
            name VARCHAR(255) NOT NULL PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
        echo " - Table categories created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        $sql = "DROP TABLE categories";
        $this->conn->exec($sql);
        echo "Table categories dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>