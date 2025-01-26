<?php

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

use Database\Seeders\CategorySeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\AttributeSeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\GallerySeeder;

require_once __DIR__ . '/../../vendor/autoload.php';



// Load EntityManager
$entityManager = require_once __DIR__ . '/../../seeder-config.php';

$loader = new Loader();
$loader->addFixture(new CategorySeeder());
$loader->addFixture(new CurrencySeeder());
$loader->addFixture(new PriceSeeder());
$loader->addFixture(new AttributeSeeder());
$loader->addFixture(new ItemSeeder());
$loader->addFixture(new ProductSeeder());
$loader->addFixture(new GallerySeeder());


$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());


echo "\033[32m✔ Data has been successfully seeded into the database!\033[0m\n";