<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;
// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreatAttributesTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the attributes table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'attributes'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - attributes table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE attributes (
            id VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE KEY,
            type VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);
        echo " - Table attributes created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
                
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();
        $sql = "DROP TABLE attributes";
        $conn->exec($sql);
        echo "Table attributes dropped successfully         \033[31mDONE\033[0m\n";
    }
}