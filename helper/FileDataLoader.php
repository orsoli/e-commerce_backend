<?php

namespace Helper;


class FileDataLoader
{
    public static function fetchDataFromFile()
    {
        // Get datas from file
        $jsonData = file_get_contents(__DIR__ . '/../data.json');
        
        // Convert datana in PHP associative array
        $data =  json_decode($jsonData, true);
        
        return $data['data'];
    }

    // Get categories
    public static function getCategories(){
        
        $data = Self::fetchDataFromFile();

        // Check if 'categories' exists in the data
        if (isset($data['categories'])) {
            return array_map(function($category) {
                return $category;
            }, $data['categories']);
        }

        return [];
    }

    public static function getPrice(){


    }
}