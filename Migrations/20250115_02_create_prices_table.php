<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;
// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreatePricesTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the prices table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'prices'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - prices table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE prices (
            name VARCHAR(255) NOT NULL PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);
        echo " - Table prices created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
                
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();
        $sql = "DROP TABLE prices";
        $conn->exec($sql);
        echo "Table prices dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>