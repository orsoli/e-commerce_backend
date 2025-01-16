<?php
require_once __DIR__ . '/Migrations/20250115_01_create_categories_table.php';
require_once __DIR__ . '/Migrations/20250115_02_create_prices_table.php';
require_once __DIR__ . '/Migrations/20250115_03_create_products_table.php';
require_once __DIR__ . '/Migrations/20250115_04_attributes_table.php';
require_once __DIR__ . '/Migrations/20250115_05_create_attribute_product_table.php';
require_once __DIR__ . '/Migrations/20250115_06_create_gallery_table.php';
require_once __DIR__ . '/Migrations/20250115_07_create_currency_table.php';
require_once __DIR__ . '/Migrations/20250115_08_create_currency_price_table.php';
require_once __DIR__ . '/Migrations/20250115_09_create_items_table.php';


try {
    // Import the tables class
    $migrations = [
                 new CreateCategoriesTable(),
                 new CreatePricesTable(),
                 new CreateProductsTable(),
                 new CreatAttributesTable(),
                 new CreateAttributeProductTable(),
                 new CreateGalleryTable(), 
                 new CreateCurrencyTable(),
                 new CreateCurrencyPriceTable(),
                 new CreateItemsTable()                
                 ];
    // Run the up method for each migration
    foreach($migrations as $migration)
        $migration->up();

    echo "\033[32m - All migrations were executed successfully!\033[0m\n";
    
}catch(PDOException $e) {
    echo "\033[31m - Connection failed: \033[0m\n" . $e->getMessage();
}