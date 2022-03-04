<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use ContainerMGy9Rx6\getArtistRepositoryService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $artiste = new Artist();

            $artiste->setArtistName("artiste".$i);
            $manager->persist($artiste);
        }
        $manager->flush();
    }


}
