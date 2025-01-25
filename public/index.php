<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getItems();

echo "<pre>";
print_r($data);
echo "</pre>";

    if (count($data) == 0) {
        echo "Attributs do not exist";
    } else {
        foreach ($data as $item) {
            # code...
            echo $item['attribute_id'] . '<br>' . $item['displayValue'] . '<br>', $item['__typename'] . '<br>';
        }
    }



?>