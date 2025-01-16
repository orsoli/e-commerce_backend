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
        // Create the categories table
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'categories'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "Table categories already exists     <p class='success'>Done</p> \n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE categories (
            name VARCHAR(255) NOT NULL PRIMARY KEY,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);
        echo "Table categories created successfully     <p class='success'>Done</p> \n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
                
        $db = new Database($_ENV['DB_HOST'],$_ENV['DB_PORT'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        $conn = $db->getConnection();
        $sql = "DROP TABLE categories";
        $conn->exec($sql);
        echo "Table categories dropped successfully \n";
    }
}
?>