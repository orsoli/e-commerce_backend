<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Config; // Import Config class

$config = new Config(); // Load environment variables

echo $config->get('DB_HOST'); // Output: localhost