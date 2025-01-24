<?php

use Database\Seeders\CategorySeeder;

require_once __DIR__ . '/../../vendor/autoload.php';



// Load EntityManager
$entityManager = require_once __DIR__ . '/../../seeder-config.php';

// Create an instance of CategorySeeder and execute load()
$seeder = new CategorySeeder();
$seeder->load($entityManager);

echo "\033[32m✔ Data has been successfully seeded into the database!\033[0m\n";