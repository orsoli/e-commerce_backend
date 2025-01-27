<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Entities\Currency;
use Helper\FileDataLoader;

$data = FileDataLoader::getCurrencyPrice();

foreach ($data as $value) {
    # code...
    echo $value['currency_label'] . '<br>' . $value['price_amount'] . '<br>';
    // echo "<pre>";
    // print_r($value);
    // echo "</pre>";

}



?>