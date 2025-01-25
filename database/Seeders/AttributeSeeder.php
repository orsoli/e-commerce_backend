<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Attribute;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class AttributeSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $attributes = FileDataLoader::getAttributes();

        foreach ($attributes as $item) {
            $attribute = new Attribute();
            $attribute->setId($item['id']);
            $attribute->setName($item['name']);
            $attribute->setType($item['type']);
            $attribute->setTypeName($item['__typename']);
            $attribute->setCreatedAt(new DateTime('now'));
            
            $manager->persist($attribute);
        }

        $manager->flush();
    }
}