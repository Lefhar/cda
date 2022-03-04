<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use App\Repository\ArtistRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DiscFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $repo = $manager->getRepository(Artist::class);
        $artist = $repo->find(rand(85,90));
        for ($i = 0; $i < 20; $i++) {
            $disc = new Disc();
                $artist = $repo->find(rand(85,90));
            $disc->setDiscTitle("title".$i);
            $disc->setDiscGenre("genre".$i);
            $disc->setDiscLabel("label".$i);
            $disc->setDiscPrice(mt_rand(10, 100));
            $disc->setDiscPicture("picture".$i.".jpg");
            $disc->setDiscYear(mt_rand(1980, 2000));
            $disc->setArtists($artist);
            $manager->persist($disc);
        }
        $manager->flush();
    }
}
