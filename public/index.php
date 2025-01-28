<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Helper\FileDataLoader;

$data = FileDataLoader::getProductImages();
echo "<pre>";
print_r($data);
echo "</pre>";

// foreach ($data as $value) {
//     # code...
//     echo $value['url'] . '<br>' . $value['product_id'] . '<br>';
// }

?>