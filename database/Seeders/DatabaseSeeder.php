<?php

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

use Database\Seeders\CategorySeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ProductPriceSeeder;
use Database\Seeders\ProductAttributeSeeder;
use Database\Seeders\AttributeItemSeeder;
use Database\Seeders\ProductImageSeeder;

require_once __DIR__ . '/../../vendor/autoload.php';



// Load EntityManager
$entityManager = require_once __DIR__ . '/../../seeder-config.php';

$loader = new Loader();
$loader->addFixture(new CategorySeeder());
$loader->addFixture(new CurrencySeeder());
$loader->addFixture(new ProductSeeder());
$loader->addFixture(new ProductPriceSeeder());
$loader->addFixture(new ProductAttributeSeeder());
$loader->addFixture(new AttributeItemSeeder());
$loader->addFixture(new ProductImageSeeder());


$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());

echo "\033[32m✔ Data has been successfully seeded into the database!\033[0m\n";