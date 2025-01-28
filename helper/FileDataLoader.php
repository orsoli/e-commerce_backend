<?php

namespace Helper;

use Doctrine\DBAL\Types\StringType;

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
    public static function getProductPrices(){

         $products = Self::getProducts();

         // Check if 'Product' exists in the data
         if (count($products) > 0) {

            $productPrices = []; // Save prices of profucts

            foreach ($products as $product) {

                $productId = $product['id'];

                foreach ($product['prices'] as $price) {
                    $productPrices[] = 
                    [
                        'product_id'=>$productId,
                        'product_prices'=>
                        [
                            'amount' => $price['amount'],
                            'currency' => (object) $price['currency'],
                            '__typename' => $price['__typename']
                        ]
                    ];
                };
            };
            
            return $productPrices;
        }

        return [];
    }

    // Get currencies
    public static function getCurrencies() {
        
        $productPrices = Self::getProductPrices();
        
        $currencies = []; // Store Currencies

        // Check if 'prices' exists
        if (count($productPrices) > 0) {
            foreach ($productPrices as $price) {

                if(!in_array($price['product_prices']['currency'], $currencies)) $currencies[] = $price['product_prices']['currency']; // Add currency in array
            }
            
            return $currencies;
        }

        return [];
    }

    // Get attributes
    public static function getProductAttributes(){

         $products = Self::getProducts();

         // Check if 'Product' exists in the data
         if (count($products) > 0) {

            $productAttributes = []; // Store attributes of products

            foreach ($products as $product) {

                foreach ($product['attributes'] as $attribute) {
                        $productAttributes[] =
                        [
                            'id' => $attribute['id'],
                            'product_id'=>$product['id'],
                            'items' => $attribute['items'],
                            'name' => $attribute['name'],
                            'attribute_type' => $attribute['type'],
                            '__typename' => $attribute['__typename']
                        ];
                }
            }
            
            return $productAttributes;
        }

        return [];
    }

    public static function getAttributeItems() {

    $productAttributes = Self::getProductAttributes();

    // Check if 'attributes' exists
    if (count($productAttributes) > 0) {
        
        $attributeItems = []; // Store items of attributes
        $itemIds = []; // Array to track unique item IDs

        foreach ($productAttributes as $attribute) {

            $attributeId = $attribute['id'];

            foreach ($attribute['items'] as $item) {

                if (!in_array($item['id'], $itemIds)) { // Check if item ID is not already in itemIds
                    $attributeItems[] = [
                        'attribute_id' => $attributeId,
                        'id' => $item['id'],
                        'display_value' => $item['displayValue'],
                        'value' => $item['value'],
                        '__typename' => $item['__typename'],
                    ];

                    $itemIds[] = $item['id']; // Add the item ID to itemIds
                }
            }
        }

        return $attributeItems;
    }

    return [];
}


    // Get gallery
    public static function getProductImages() {
        
        $products = Self::getProducts();

        if (count($products) > 0) {

            $gallery = []; // Store images for each product

            foreach ($products as $product) {
                
                $productId = $product['id']; // Get product id

                foreach ($product['gallery'] as $url) {

                    $gallery[] =
                    [
                        'product_id' => $productId,
                        'url' => $url
                    ];
                }
            }

            return $gallery;
    }

    return [];
    }
}