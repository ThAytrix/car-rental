<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAnimalData() as $data) {
            $animal = new Animal();

            $animal->setName($data['name']);
            $animal->setAge($data['age']);
            $animal->setType($this->getReference($data['type']));
            $animal->setGender($data['gender']);
            $animal->setWeight($data['weight']);
            $animal->setPrice($data['price']);
            $animal->setPath($data['path']);

            $manager->persist($animal);
        }

        $manager->flush();
    }

    /**
    * Données Type
    *
    * @return array[]
    */
    private function getAnimalData(): array
    {
        return [
            [
                'name' => 'Fiat 500',
                'age' => 2019,
                'type' => 'type_2',
                'gender' => 1,
                'weight' => 1320,
                'price' => 99,
                'path' => 'fiat500.jpg'
            ],
            [
                'name' => 'Volkswagen Golf',
                'age' => 2017,
                'type' => 'type_1',
                'gender' => 1,
                'weight' => 1475,
                'price' => 179,
                'path' => 'golf7.jpg'
            ],
            [
                'name' => 'Renault Kangoo',
                'age' => 2020,
                'type' => 'type_4',
                'gender' => 1,
                'weight' => 1555,
                'price' => 149,
                'path' => 'kangoo.jpg'
            ],
            [
                'name' => 'Renault Twingo',
                'age' => 2018,
                'type' => 'type_2',
                'gender' => 0,
                'weight' => 1240,
                'price' => 99,
                'path' => 'twingo.jpg'
            ],
            [
                'name' => 'Mazda MX-5',
                'age' => 2021,
                'type' => 'type_1',
                'gender' => 1,
                'weight' => 1580,
                'price' => 219,
                'path' => 'mx5.jpg'
            ],
            [
                'name' => 'Toyota Aygo',
                'age' => 2016,
                'type' => 'type_2',
                'gender' => 0,
                'weight' => 1230,
                'price' => 99,
                'path' => 'aygo.jpg'
            ],
            [
                'name' => 'Audi A3',
                'age' => 2018,
                'type' => 'type_1',
                'gender' => 1,
                'weight' => 1585,
                'price' => 249,
                'path' => 'a3.jpg'
            ],
            [
                'name' => 'BMW X1',
                'age' => 2021,
                'type' => 'type_3',
                'gender' => 0,
                'weight' => 1680,
                'price' => 249,
                'path' => 'x1.jpg'
            ],
            [
                'name' => 'Smart Fortwo',
                'age' => 2016,
                'type' => 'type_2',
                'gender' => 0,
                'weight' => 1085,
                'price' => 119,
                'path' => 'fortwo.jpg'
            ],
            [
                'name' => 'Toyota RAV4',
                'age' => 2021,
                'type' => 'type_3',
                'gender' => 0,
                'weight' => 2180,
                'price' => 209,
                'path' => 'rav4.jpg'
            ],
            [
                'name' => 'Mercedes A180',
                'age' => 2018,
                'type' => 'type_1',
                'gender' => 1,
                'weight' => 1590,
                'price' => 249,
                'path' => 'a180.jpg'
            ],
            [
                'name' => 'Dacia Sandero',
                'age' => 2021,
                'type' => 'type_1',
                'gender' => 0,
                'weight' => 1480,
                'price' => 139,
                'path' => 'sandero.jpg'
            ]              
        ];
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
