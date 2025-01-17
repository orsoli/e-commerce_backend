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

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'products'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - products table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE products (
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
        echo " - Table products created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        $sql = "DROP TABLE products";
        $this->conn->exec($sql);
        echo "Table products dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>