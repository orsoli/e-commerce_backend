<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\AttributeItem;
use App\Entities\ProductAttribute;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class AttributeItemSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $attributeItems = FileDataLoader::getAttributeItems();

        foreach ($attributeItems as $item) {

            $attribute = $manager->getRepository(ProductAttribute::class)->findOneBy(['id' => $item['attribute_id']]);

            $attributeItem = new AttributeItem();
            $attributeItem->setId($item['id']);
            $attributeItem->setAttribute($attribute);
            $attributeItem->setValue($item['value']);
            $attributeItem->setDisplayValue($item['displayValue']);
            $attributeItem->setTypeName($item['__typename']);
            $attributeItem->setCreatedAt(new DateTime('now'));
            
            $manager->persist($attributeItem);
        }

        $manager->flush();
    }
}