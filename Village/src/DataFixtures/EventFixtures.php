<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Event;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;


class EventFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR'); //* générateur de fausses données(Classe Faker)

        for ($i = 1; $i <= 50; $i++) {
            $event = new Event();
            $event->setNom($faker->name())
                ->setDescription($faker->paragraph())
                ->setLieu($faker->city())
                ->setDate($faker->dateTimeThisDecade());

            $manager->persist($event);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}


