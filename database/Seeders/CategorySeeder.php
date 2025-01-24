<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Category;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class CategorySeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = FileDataLoader::getCategories();

        foreach ($data as $item) {
            $category = new Category();
            $category->setName($item['name']);
            $category->setTypeName($item['__typename']);
            $category->setCreatedAt(new DateTime('now'));
            
            $manager->persist($category);
        }

        $manager->flush();
    }
}