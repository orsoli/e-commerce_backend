<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Currency;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class CurrencySeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $currencies = FileDataLoader::getCurrencies();

        foreach ($currencies as $item) {
            $currency = new Currency();
            $currency->setLabel($item->label);
            $currency->setSymbol($item->symbol);
            $currency->setTypeName($item->__typename);
            $currency->setCreatedAt(new DateTime('now'));
            
            $manager->persist($currency);
        }

        $manager->flush();
    }
}