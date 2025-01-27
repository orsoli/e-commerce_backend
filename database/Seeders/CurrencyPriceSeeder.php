<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\CurrencyPrice;
use App\Entities\Currency;
use App\Entities\Price;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class CurrencyPriceSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $currenciesPrices = FileDataLoader::getCurrencyPrice();

        foreach ($currenciesPrices as $item) {

            $price = $manager->getRepository(Price::class)->findOneBy(['amount' => $item['price_amount']]);

            
            $currency = $manager->getRepository(Currency::class)->findOneBy(['label' => $item['currency_label']]);

            $currencyPrice = new CurrencyPrice();
            $currencyPrice->setPrice($price);
            $currencyPrice->setCurrency($currency);
            $currencyPrice->setTypeName('Currency_Price');
            $currencyPrice->setCreatedAt(new DateTime('now'));
            
            
            $manager->persist($currencyPrice);
        }
        
        $manager->flush();
    }
}