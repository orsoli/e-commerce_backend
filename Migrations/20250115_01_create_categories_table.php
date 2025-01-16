<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;
// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateCategoriesTable {
    
    /**
     * Run the migrations
     */
    public function up() {

        // Get th Database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'categories'";
        $result = $conn->query($sql);
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
        $conn->exec($sql);
        echo " - Table categories created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
                
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();
        $sql = "DROP TABLE categories";
        $conn->exec($sql);
        echo "Table categories dropped successfully         \033[31mDONE\033[0m\n";
    }
}
?>