<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture implements FixtureGroupInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR'); //* générateur de fausses données(Classe Faker)

        $userAdmin = new User();
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setEmail('alex@gmail.com');
        $userAdmin->setUsername("Alexandre");
        $password = $this->encoder->encodePassword($userAdmin, 'useradmin');
        $userAdmin->setPassword($password);

        $manager->persist($userAdmin);

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setUsername($faker->userName())
                ->setPassword($faker->password())
                ->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group2'];
    }
}
