<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateAttributeProductTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the attribute_product table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'attribute_product'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - attribute_product table already exists\033[0m\n";
            return;
        }
        // Create the table with foreign keys
        $sql = "CREATE TABLE attribute_product (
            id BIGINT NOT NULL PRIMARY KEY,
            product_id VARCHAR(255) NOT NULL,
            attribute_id VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (product_id) REFERENCES products(id),
            FOREIGN KEY (attribute_id) REFERENCES attributes(id)
        )";
        $conn->exec($sql);
        echo " - Table attribute_product created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "DROP TABLE attribute_product";
        $conn->exec($sql);
        echo "Table attribute_product dropped successfully         \033[31mDONE\033[0m\n";
    }
}