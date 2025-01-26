<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\AttributeProduct;
use App\Entities\Product;
use App\Entities\Attribute;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class AttributeProductSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $attributeProduct = FileDataLoader::getAttributeProduct();

        foreach ($attributeProduct as $item) {

            $product = $manager->getRepository(Product::class)->findOneBy(['id' => $item['product_id']]);
            $attribute = $manager->getRepository(Attribute::class)->findOneBy(['id' => $item['attribute_id']]);

            $attributeProduct = new AttributeProduct();
            $attributeProduct->setProduct($product);
            $attributeProduct->setAttribute($attribute);
            $attributeProduct->setTypeName('Attribut-Product');
            $attributeProduct->setCreatedAt(new DateTime('now'));
            
            $manager->persist($attributeProduct);
        }

        $manager->flush();
    }
}