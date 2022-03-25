<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Brand for Food
        $franklin = new Brand();
        $franklin -> setName('Franklin');
        $franklin -> setImage('franklin_logo.png');
        $this->addReference('Franklin',$franklin);
        $manager->persist($franklin);

        $lilysKitchen = new Brand();
        $lilysKitchen -> setName('Lyli\'s Kitchen');
        $lilysKitchen -> setImage('lilys_Kitchen_logo.png');
        $this->addReference('Lyli\'s Kitchen',$lilysKitchen);
        $manager->persist($lilysKitchen);

        $wolfood = new Brand();
        $wolfood -> setName('Wolfood');
        $wolfood -> setImage('wolfood_logo.png');
        $this->addReference('Wolfood',$wolfood);
        $manager->persist($wolfood);


        //Brand for Accesories & clothes
        $labbvenn = new Brand();
        $labbvenn -> setName('Labbvenn');
        $labbvenn -> setImage('labbvenn_logo.png');
        $this->addReference('Labbvenn',$labbvenn);
        $manager->persist($labbvenn);

        $miacara = new Brand();
        $miacara -> setName('Miacara');
        $miacara -> setImage('miacara_logo.png');
        $this->addReference('Miacara',$miacara);
        $manager->persist($miacara);

        $milkPepper = new Brand();
        $milkPepper -> setName('Milk & Pepper');
        $milkPepper -> setImage('milk_pepper_logo.jpg');
        $this->addReference('Milk & Pepper',$milkPepper);
        $manager->persist($milkPepper);

        $purrsToys = new Brand();
        $purrsToys -> setName('Purrs Toys');
        $purrsToys -> setImage('purrs_toys_logo.png');
        $this->addReference('Purrs Toys',$purrsToys);
        $manager->persist($purrsToys);


        //Brand for Health & Care

        $biogance = new Brand();
        $biogance -> setName('Biogance');
        $biogance -> setImage('biogance_logo.png');
        $this->addReference('Biogance',$biogance);
        $manager->persist($biogance);

        $biovenol = new Brand();
        $biovenol -> setName('Biovenol');
        $biovenol -> setImage('biovenol_logo.png');
        $this->addReference('Biovenol',$biovenol);
        $manager->persist($biovenol);

        $nellumbo = new Brand();
        $nellumbo -> setName('Nellumbo');
        $nellumbo -> setImage('nellumbo_logo.png');
        $this->addReference('Nellumbo',$nellumbo);
        $manager->persist($nellumbo);
        $manager->flush();
    }
}
