<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;
// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateProductsTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the products table
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'products'";
        $result = $conn->query($sql);
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
            description TEXT NULLABLE,
            price DECIMAL(8,2) UNSIGNED,
            category VARCHAR(255),
            brand VARCHAR(255),
            __typename VARCHAR(255),
            FOREIGN KEY (price) REFERENCES prices(amount),
            FOREIGN KEY (category) REFERENCES categories(name)
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);
        echo " - Table products created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
                
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();
        $sql = "DROP TABLE products";
        $conn->exec($sql);
        echo "Table products dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>