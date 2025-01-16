<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Migrations/20250115_create_categories_table.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


try {
    // Import the CreateCategoriesTable class
    $migration = new CreateCategoriesTable();
    // Run the up method
    $migration->up();

    echo "All migrations were executed successfully!\n";
    
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}