<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\ProductImage;
use App\Entities\Product;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class ProductImageSeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gallery = FileDataLoader::getProductImages();

        foreach ($gallery as $item) {

            // Get product base on galleries
            $product = $manager->getRepository(Product::class)->findOneBy(['id' => $item['product_id']]);

            $url = new ProductImage();
            $url->setProduct($product);
            $url->setUrl($item['url']);
            $url->setCreatedAt(new DateTime('now'));
            
            $manager->persist($url);
        }

        $manager->flush();

    }
}