<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getAttributeItems();
echo "<pre>";
print_r($data);
echo "</pre>";

?>