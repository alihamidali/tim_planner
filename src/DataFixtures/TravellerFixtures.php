<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Sector;
use App\Entity\Traveller;
use App\Entity\TravellerCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TravellerFixtures extends Fixture
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $file = fopen(__DIR__ . '/../../public/test_users.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            if ($line[0] === 'Email') continue;

            $traveller = new Traveller();
            $traveller->setEmail($line[0]);
            $traveller->setFirstName('-');
            $traveller->setLastName('-');
            $traveller->setUserName('-');
            $traveller->setDateOfBirth(new \DateTime());
            $traveller->setPassword($line[1]);
            $traveller->setMobileNo('-');
            $traveller->setPhoneNo('-');
            $traveller->setGender('-');
            $traveller->setPhoto('-');

            $category = $manager->getRepository('App\Entity\TravellerCategory')->findOneBy(['name' => $line[2]]);

            if (!$category) {
                $category = new TravellerCategory();
                $category->setName($line[2]);
                $manager->persist($category);
                $manager->flush();
            }
            $traveller->setTravellerCategory($category);

            $cities = explode(',' , $line[3]);
            $cityCollection = new ArrayCollection();
            foreach ($cities as $cityName) {
                $cityName = ltrim($cityName);

                $city = $manager->getRepository('App\Entity\City')->findOneBy(['name' => $cityName]);

                if (!$city) {
                    $city = new City();
                    $city->setName($cityName);
                    $manager->persist($city);
                    $manager->flush();
                }
                $cityCollection->add($city);
            }
            $traveller->setCity($cityCollection);

            $em = $this->container->get('doctrine.orm.entity_manager');
            $sector = $em->getRepository('App\Entity\Sector')->findOneBy(['name' => $line[4]]);

            if (!$sector) {
                $sector = new Sector();
                $sector->setName($line[4]);
                $manager->persist($sector);
                $manager->flush();
            }

            $traveller->setFavoriteHangoutPlace($sector);
            $traveller->setFavoriteCuisine($line[5]);
            $traveller->setDreamHoliday($line[6]);
            $manager->persist($traveller);
        }
        $manager->flush();
        fclose($file);

    }
}