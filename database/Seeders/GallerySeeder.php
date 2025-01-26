<?php

namespace Database\Seeders;

require_once __DIR__ .'/../../vendor/autoload.php';

use App\Entities\Gallery;
use App\Entities\Product;
use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Helper\FileDataLoader;

class GallerySeeder implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gallery = FileDataLoader::getGallery();

        foreach ($gallery as $productId => $urls) {

            // Get product base on galleries
            $product = $manager->getRepository(Product::class)->findOneBy(['id' => $productId]); 

            // Check if attrubte does not exists
            if (!$product) {
            throw new \Exception("Product with ID {$productId} not found.");
            }

            foreach ($urls as $singleUrl) {
                $url = new Gallery();
                $url->setUrl($singleUrl);
                $url->setProduct($product);
                $url->setCreatedAt(new DateTime('now'));
                
                $manager->persist($url);
            }
        }

        $manager->flush();
    }
}