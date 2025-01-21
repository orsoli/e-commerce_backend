<?php

namespace App\Helper;


class ApiDataLoader
{
    public static function fetchDataFromFile()
    {
        // Get datas from file
        $jsonData = file_get_contents('data.json');
        
        // Convert datana in PHP associative array
        return json_decode($jsonData, true);
    }
}