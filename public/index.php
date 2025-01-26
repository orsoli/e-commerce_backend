<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getAttributeProduct();

foreach ($data as $value) {
    # code...
    echo $value['attribute_id'] . '<br>';
    // echo "<pre>";
    // print_r($value);
    // echo "</pre>";
}



?>