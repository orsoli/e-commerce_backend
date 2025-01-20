<?php

require 'vendor/autoload.php';

use App\Config\Config;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$paths = [__DIR__.'/app/Entities'];
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

$ORMConfig = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
// Creating the database connection
$connection = DriverManager::getConnection($dbParams, $ORMConfig);
// Creating the entity manager
$entityManager = new EntityManager($connection, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));