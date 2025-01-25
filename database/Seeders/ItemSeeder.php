<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Item;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class CategorySeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $items = FileDataLoader::getCategories();

        foreach ($items as $sigleItem) {
            $item = new Item();
            $item->setId($sigleItem['id']);
            $item->setValue($sigleItem['value']);
            $item->setDisplayValue($sigleItem['displayValue']);
            $item->setTypeName($sigleItem['__typename']);
            $item->setCreatedAt(new DateTime('now'));
            
            $manager->persist($item);
        }

        $manager->flush();
    }
}