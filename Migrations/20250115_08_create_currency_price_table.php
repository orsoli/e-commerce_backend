<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class CreateCurrencyPriceTable {
    
    /**
     * Run the migrations
     */
    public function up() {
        // Create the currency_price table
        $db = new Database();
        $conn = $db->getConnection();

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'currency_price'";
        $result = $conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - currency_price table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE currency_price (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            price DECIMAL(8,2) UNSIGNED NOT NULL,
            currency_id BIGINT UNSIGNED NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (price) REFERENCES prices(amount),
            FOREIGN KEY (currency_id) REFERENCES currency(id)
        )";
        $conn->exec($sql);
        echo " - Table currency_price created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "DROP TABLE currency_price";
        $conn->exec($sql);
        echo "Table currency_price dropped successfully         \033[31mDONE\033[0m\n";
    }
}