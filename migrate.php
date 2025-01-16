<?php
require_once __DIR__ . '/Migrations/20250115_01_create_categories_table.php';


try {
    // Import the CreateCategoriesTable class
    $migration = new CreateCategoriesTable();
    // Run the up method
    $migration->up();

    echo "\033[32m - All migrations were executed successfully!\033[0m\n";
    
}catch(PDOException $e) {
    echo "\033[31m - Connection failed: \033[0m\n" . $e->getMessage();
}