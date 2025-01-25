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

    // Get products
    public static function getProducts(){
        
        $data = Self::fetchDataFromFile();

        // Check if 'products' exists in the data
        if (isset($data['products'])) {
            return array_map(function($product) {
                return $product;
            }, $data['products']);
        }

        return [];
    }


    // Get prices
    public static function getPrices(){

         $products = Self::getProducts();

         // Check if 'Product' exists in the data
         if (count($products) > 0) {

            $prices = []; // Save prices of profucts

            foreach ($products as $productPrices) {
                foreach ($productPrices['prices'] as $item) {
                    $uniqueKey = (string)$item['amount'];
                    if (!array_key_exists($uniqueKey, $prices)) {
                        $prices[$uniqueKey] = $item;
                    };
                };
            };
            
            return $prices;
        }

        return [];
    }

    // Get currencies
    public static function getCurrencies() {
        $prices = Self::getPrices();
        
        $currencies = []; // Store Currencies

        // Check if 'prices' exists
        if (count($prices) > 0) {
            foreach ($prices as $price) {
                $currency = $price['currency']; // Get currency
                if (!in_array($currency, $currencies)) {
                    $currencies[] = $currency; // Add currency in array
                }
            }
            return $currencies;
        }

        return [];
    }

    // Get attributes
    public static function getAttributes(){

         $products = Self::getProducts();

         // Check if 'Product' exists in the data
         if (count($products) > 0) {

            $attributes = []; // Save prices of profucts

            foreach ($products as $product) {
                foreach ($product['attributes'] as $attribute) {
                    $uniqueKey = $attribute['id'];
                    if (!array_key_exists($uniqueKey, $attributes)) {
                        $attributes[$uniqueKey] = $attribute;
                    };
                };
            };
            
            return $attributes;
        }

        return [];
    }

}