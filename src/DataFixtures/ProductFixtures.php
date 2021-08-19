<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProductData() as $data) {
            $product = new Product();

            $product->setTitle($data['title']);
            $product->setDescription($data['description']);
            $product->setCategory($this->getReference($data['category']));
            $product->setPrice($data['price']);
            $product->setQuantity($data['quantity']);
            $product->setPath($data['path']);

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
    * Données Type
    *
    * @return array[]
    */
    private function getProductData(): array
    {
        return [
            [
                'title' => 'Huile 5w30',
                'description' => 'Huile moteur QUARTZ 9000 NFC 5W30 - 5 Litres',
                'category' => 'category_1',
                'price' => 29.99,
                'quantity' => 1,
                'path' => 'img/products/cars/huile5w30.jpg'
            ],
            [
                'title' => 'Sapin désodorisant',
                'description' => "Fini les mauvaises odeurs dans votre voiture avec ces désodorisants amusants d'Arbre Magique",
                'category' => 'category_3',
                'price' => 2.99,
                'quantity' => 3,
                'path' => 'img/products/cars/sapin.jpg'
            ],
            [
                'title' => 'Set de tapis',
                'description' => "L'élégance en mouvement: luxueux tapis de sol pour voiture sur mesure et personnalisable",
                'category' => 'category_2',
                'price' => 34.99,
                'quantity' => 2,
                'path' => 'img/products/cars/tapis.jpg'
            ],
            [
                'title' => 'Lave-glace 5L',
                'description' => "Ce lave-glace été parfumé. nettoie et enlève les résidus d'insectes sur votre pare-brise par simple pulvérisation.",
                'category' => 'category_1',
                'price' => 4.49,
                'quantity' => 10,
                'path' => 'img/products/cars/lave-glace.jpg'
            ],
            [
                'title' => '4 enjoliveurs gris',
                'description' => "Les enjoliveurs sont l'accessoire indispensable pour dissimuler les jantes en tôle bien souvent inesthétiques.",
                'category' => 'category_2',
                'price' => 24.49,
                'quantity' => 0,
                'path' => 'img/products/cars/enjoliveurs.jpg'
            ],
            [
                'title' => 'Autoradio',
                'description' => "Tuner Radio Numérique  DAB+, Ports UBS et AUX en façade de l'autoradio, Compatible Commandes au volants, 1 RCA 2.5V, Egaliseur graphique 13 bandes, Menus en Français, Afficheur LCD 13 caractères, Chassis Court 100 mm",
                'category' => 'category_2',
                'price' => 99.99,
                'quantity' => 8,
                'path' => 'img/products/cars/autoradio.jpg'
            ],
            [
                'title' => 'Pneu RUNWAY ENDURO HP 205/55 R16 91 V',
                'description' => "Evacuation efficace de l'eau. Très bonne précision de conduite. Conduite confortable.",
                'category' => 'category_2',
                'price' => 64.99,
                'quantity' => 0,
                'path' => 'img/products/cars/pneu.jpg'
            ],
            [
                'title' => "Lustrant Meguiar's",
                'description' => "Meguiar's Ultimate Car Polish Lustrant Ultime 473ml",
                'category' => 'category_2',
                'price' => 19.99,
                'quantity' => 5,
                'path' => 'img/products/cars/lustrant.jpg'
            ]
        ];
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
