<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Currency;
use App\Entities\Product;
use App\Entities\ProductPrice;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class ProductPriceSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $productPrices = FileDataLoader::getProductPrices();
        

        foreach ($productPrices as $item) {

            $product = $manager->getRepository(Product::class)->findOneBy(['id' => $item['product_id']]);

            $currency = $manager->getRepository(Currency::class)->findOneBy(['label' => $item['product_prices']['currency']->label]);
            
            $price = new ProductPrice();
            $price->setProduct($product);
            $price->setCurrency($currency);
            $price->setAmount($item['product_prices']['amount']);
            $price->setTypeName($item['product_prices']['__typename']);
            $price->setCreatedAt(new DateTime('now'));
            
            $manager->persist($price);
        }

        $manager->flush();
    }
}