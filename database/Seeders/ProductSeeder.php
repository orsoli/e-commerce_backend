<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Category;
use App\Entities\Price;
use App\Entities\Product;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class ProductSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $products = FileDataLoader::getProducts();

        foreach ($products as $item=>$value) {

            foreach($value['prices'] as $item=>$productPrice){

                $price = $manager->getRepository(Price::class)->findOneBy(['amount' => $productPrice['amount']]);
            }
            
            $category = $manager->getRepository(Category::class)->findOneBy(['name' => $value['category']]);

            $product = new Product();
            $product->setId($value['id']);
            $product->setName($value['name']);
            $product->setInStock($value['inStock']);
            $product->setDescription($value['description']);
            $product->setPrice($price);
            $product->setCategory($category);
            $product->setBrand($value['brand']);
            $product->setTypeName($value['__typename']);
            $product->setCreatedAt(new DateTime('now'));
            
            $manager->persist($product);
        }

        $manager->flush();
    }
}