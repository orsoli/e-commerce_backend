<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getProducts();

// echo "<pre>";
// print_r($data);
// echo "</pre>";

    if (count($data) == 0) {
        echo "Attributs do not exist";
    } else {
        foreach ($data as $item => $value) {
            foreach ($value['prices'] as $key => $value) {
                echo "<pre>";
                print_r($value['amount']);
                echo "</pre>";
                # code...
            }
            // echo $value['prices'] . '<br>';
        }
    }



?>