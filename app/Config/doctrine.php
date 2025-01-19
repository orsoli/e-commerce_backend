<?php

use Doctrine\DBAL\DriverManager;
use App\Config\Config;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/../../vendor/autoload.php';

// Paths to entities
$paths = [__DIR__ . '/../Entities'];
$isDevMode = true;

// Load environment variables
$envConfig = new Config();

// Database parameters
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => $envConfig->get('DB_USERNAME'),
    'password' => $envConfig->get('DB_PASSWORD'),
    'dbname'   => $envConfig->get('DB_DATABASE'),
    'host'     => $envConfig->get('DB_HOST'),
    'port'     => $envConfig->get('DB_PORT') ?? 3306,
];

// Mapping configuration
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
// Creating the database connection
$connection = DriverManager::getConnection($dbParams, $config);
// Creating the entity manager
$entityManager = new EntityManager($connection, $config);


return $entityManager;