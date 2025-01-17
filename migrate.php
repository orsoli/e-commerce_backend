<?php
require_once __DIR__ . '/vendor/autoload.php';

// Import the migrations
require_once __DIR__ . '/Migrations/20250115_01_create_categories_table.php';
require_once __DIR__ . '/Migrations/20250115_02_create_prices_table.php';
require_once __DIR__ . '/Migrations/20250115_03_create_products_table.php';
require_once __DIR__ . '/Migrations/20250115_04_attributes_table.php';
require_once __DIR__ . '/Migrations/20250115_05_create_attribute_product_table.php';
require_once __DIR__ . '/Migrations/20250115_06_create_gallery_table.php';
require_once __DIR__ . '/Migrations/20250115_07_create_currency_table.php';
require_once __DIR__ . '/Migrations/20250115_08_create_currency_price_table.php';
require_once __DIR__ . '/Migrations/20250115_09_create_items_table.php';

use App\Database\Database;
use Dotenv\Dotenv;
// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

// Get the Database connection
$db = new Database();
$connection = $db->getConnection();

try {
    // Import the tables classes
    $migrations = [
        new CreateCategoriesTable($connection),
        new CreatePricesTable($connection),
        new CreateProductsTable($connection),
        new CreatAttributesTable($connection),
        new CreateAttributeProductTable($connection),
        new CreateGalleryTable($connection), 
        new CreateCurrencyTable($connection),
        new CreateCurrencyPriceTable($connection),
        new CreateItemsTable($connection)                
    ];
    // Run the up method for each migration
    foreach($migrations as $migration)
        // Run the up method
        $migration->up();

    echo "\033[32m \u{2714} All migrations were executed successfully!\033[0m\n";
    
}catch(PDOException $e) {
    echo "\033[31m X Connection failed: {$e->getMessage()}\033[0m\n";
}