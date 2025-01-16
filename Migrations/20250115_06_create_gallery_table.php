<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateGalleryTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the gallery table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'gallery'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - gallery table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE gallery (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            product_id VARCHAR(255) NOT NULL,
            url TEXT NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        $conn->exec($sql);
        echo " - Table gallery created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "DROP TABLE gallery";
        $conn->exec($sql);
        echo "Table gallery dropped successfully         \033[31mDONE\033[0m\n";
    }
}