<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Item;
use App\Entities\Attribute;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class ItemSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $items = FileDataLoader::getItems();

        foreach ($items as $singleItem) {

            $attribute = $manager->getRepository(Attribute::class)->findOneBy(['id' => $singleItem['attribute_id']]);
            // Check if attrubte does not exists
            if (!$attribute) {
            throw new \Exception("Attribute with ID {$singleItem['attribute_id']} not found.");
            }

            $existingItem = $manager->getRepository(Item::class)->find($singleItem['id']);
            if ($existingItem) {
                continue; // Skip if item exists
            }

            $item = new Item();
            $item->setId($singleItem['id']);
            $item->setAttribute($attribute);
            $item->setValue($singleItem['value']);
            $item->setDisplayValue($singleItem['displayValue']);
            $item->setTypeName($singleItem['__typename']);
            $item->setCreatedAt(new DateTime('now'));
            
            $manager->persist($item);
        }

        $manager->flush();
    }
}