<?php

use Doctrine\Common\DataFixtures\Loader;
use Database\Seeders\CategorySeeder;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

require_once __DIR__ . '/../../vendor/autoload.php';



// Load EntityManager
$entityManager = require_once __DIR__ . '/../../seeder-config.php';

$loader = new Loader();
$loader->addFixture(new CategorySeeder());


$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());


echo "\033[32m✔ Data has been successfully seeded into the database!\033[0m\n";