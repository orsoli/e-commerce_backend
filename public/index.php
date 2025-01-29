<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getProductAttributes();
echo "<pre>";
print_r($data[0]);
echo "</pre>";

foreach ($data as $value) {

    echo $value['id'] . '<br>';
    # code...
}


?>