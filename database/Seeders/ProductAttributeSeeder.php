<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Product;
use App\Entities\ProductAttribute;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class ProductAttributeSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $productAttributes = FileDataLoader::getProductAttributes();

        foreach ($productAttributes as $item) {

            $product = $manager->getRepository(Product::class)->findOneBy(['id' => $item['product_id']]);

            $productAttribute = new ProductAttribute();
            $productAttribute->setId($item['id']);
            $productAttribute->setProduct($product);
            $productAttribute->setName($item['name']);
            $productAttribute->setAttributeType($item['attribute_type']);
            $productAttribute->setTypeName($item['__typename']);
            $productAttribute->setCreatedAt(new DateTime('now'));
            
            $manager->persist($productAttribute);
        }

        $manager->flush();

    }
}