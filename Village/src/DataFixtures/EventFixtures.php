<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Event;
use Faker\Factory;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');//générateur de fausses données(Classe Faker)

        for ($i = 1; $i <= 50; $i++) {
            $event = new Event();
            $event->setNom($faker->name())
                ->setDescription($faker->paragraph())
                ->setLieu($faker->city())
                ->setDate($faker->dateTime());

            $manager->persist($event);
        }
        $manager->flush(); //execute la requête

        // for ($i = 1; $i <= 10; $i++) {
        //     $event = new Event();
        //     $event->setNom("L'événement n° $i")
        //         ->setDescription("Description de l'événement n° $i")
        //         ->setLieu("Lieu de l'événement n° $i")
        //         ->setDate(new \DateTime());

        //     $manager->persist($event); //prepare la création d'événements, en persistant l'événement dans le temps
        // }

        // $manager->flush(); //execute la requête
    }
}
