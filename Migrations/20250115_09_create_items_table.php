<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateItemsTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the items table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'items'";
        $result = $conn->query($sql);
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
        $conn->exec($sql);
        echo " - Table items created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "DROP TABLE items";
        $conn->exec($sql);
        echo "Table items dropped successfully         \033[31mDONE\033[0m\n";
    }
}