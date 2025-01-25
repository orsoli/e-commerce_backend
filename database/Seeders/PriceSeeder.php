<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Price;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class PriceSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $prices = FileDataLoader::getPrices();
        

        foreach ($prices as $item) {
            $price = new Price();
            $price->setAmount($item['amount']);
            $price->setTypeName($item['__typename']);
            $price->setCreatedAt(new DateTime('now'));
            
            $manager->persist($price);
        }

        $manager->flush();
    }
}