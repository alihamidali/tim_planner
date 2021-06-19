<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Destination;
use App\Entity\Sector;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DestinationFixtures extends Fixture
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
        $file = fopen(__DIR__ . '/../../public/tourist_sites.csv', 'r');

        while (($line = fgetcsv($file)) !== FALSE) {
            if ($line[0] === 'City') continue;

            $destination = new Destination();

            $city = $manager->getRepository('App\Entity\City')->findOneBy(['name' => $line[0]]);

            if (!$city) {
                $city = new City();
                $city->setName($line[0]);
                $manager->persist($city);
                $manager->flush();
            }
            $destination->setCity($city);

            $sector = $manager->getRepository('App\Entity\Sector')->findOneBy(['name' => $line[1]]);
            if (!$sector) {
                $sector = new Sector();
                $sector->setName($line[1]);
                $manager->persist($sector);
                $manager->flush();
            }
            $destination->setSector($sector);
            $destination->setName($line[2]);
            $destination->setPointOfInterest($line[3]);
            $destination->setAddress($line[4]);

            list($longitude, $latitude) = $line[5] != "" ? explode(',', $line[5]) : '';
            $googleMapLink = "https://www.google.com/maps/place/" . intval($longitude) . "%C2%B044'24.7%22N+" . intval($latitude) . "68%C2%B002'26.6%22E/@$longitude,$latitude,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d$longitude!4d$latitude";
            $destination->setLongitude($longitude);
            $destination->setLatitude($latitude);
            $destination->setGoogleMapLink($googleMapLink);
            $destination->setTickets($line[7]);
            $destination->setPhone($line[8]);
            $destination->setDescription($line[9]);
            $destination->setDescription2($line[10]);

//            $startTime = mt_rand(0,23).":".str_pad(mt_rand(0,59), 2, "0", STR_PAD_LEFT);
//            $endTime = mt_rand(0,23).":".str_pad(mt_rand(0,59), 2, "0", STR_PAD_LEFT);
//
            $startTime = (new \DateTime())->setTime(mt_rand(0, 23), mt_rand(0, 59));
            $endTime = (new \DateTime())->setTime(mt_rand(0, 23), mt_rand(0, 59));

            $destination->setIsOpenOnMonday(rand(0, 1));
            $destination->setMondayOpenTime($startTime);
            $destination->setMondayCloseTime($endTime);

            $destination->setIsOpenOnTuesday(rand(0, 1));
            $destination->setTuesdayOpenTime($startTime);
            $destination->setTuesdayCloseTime($endTime);

            $destination->setIsOpenOnWednesday(rand(0, 1));
            $destination->setWednesdayOpenTime($startTime);
            $destination->setWednesdayCloseTime($endTime);

            $destination->setIsOpenOnThursday(rand(0, 1));
            $destination->setThursdayOpenTime($startTime);
            $destination->setThursdayCloseTime($endTime);

            $destination->setIsOpenOnFriday(rand(0, 1));
            $destination->setFridayOpenTime($startTime);
            $destination->setFridayCloseTime($endTime);

            $startTime = (new \DateTime())->setTime(mt_rand(0, 23), mt_rand(0, 59));
            $endTime = (new \DateTime())->setTime(mt_rand(0, 23), mt_rand(0, 59));

            $destination->setIsOpenOnSaturday(rand(0, 1));
            $destination->setSaturdayOpenTime($startTime);
            $destination->setSaturdayCloseTime($endTime);

            $destination->setIsOpenOnSunday(rand(0, 1));
            $destination->setSundayOpenTime($startTime);
            $destination->setSundayCloseTime($endTime);

            $manager->persist($destination);
        }
        $manager->flush();
        fclose($file);
    }
}