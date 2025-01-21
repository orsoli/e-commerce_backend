<?php
require_once __DIR__ . '/../helper/ApiDataLoader.php';

use App\Helper\ApiDataLoader;

$data = ApiDataLoader::fetchDataFromApi();


    echo '<pre>';
    print_r($data);
    echo '</pre>';


?>