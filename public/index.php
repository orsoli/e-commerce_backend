<?php
require_once __DIR__ . '/../helper/FileDataLoader.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getCategories();

    if (count($data) == 0) {
        echo "Categories do not exist";
    } else {
        foreach ($data as $item) {
            # code...
            echo $item['name'] . '<br>', $item['__typename'] . '<br>';
        }
    }



?>