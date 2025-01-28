<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getCategories();
// echo "<pre>";
// print_r($data[0]);
// echo "</pre>";

foreach ($data as $value) {
    # code...
    echo $value['name'] . '<br>';
}

?>