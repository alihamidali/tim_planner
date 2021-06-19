<?php

namespace App\Service;

use App\Entity\Destination;
use App\Repository\CityRepository;
use App\Repository\DestinationRepository;
use App\Repository\TravellerRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class TravellerService
{
    /**
     * @var TravellerRepository
     */
    private $travellerRepository;
    /**
     * @var DestinationRepository
     */
    private $destinationRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;

    public function __construct(
        TravellerRepository $travellerRepository,
        DestinationRepository $destinationRepository,
        CityRepository $cityRepository
    ) {

        $this->travellerRepository = $travellerRepository;
        $this->destinationRepository = $destinationRepository;
        $this->cityRepository = $cityRepository;
    }

    public function getTravelPlan($startDate, $endDate, $location, $travellerId, $timeAllocated)
    {
        $startDate      = new \DateTime($startDate);
        $endDate        = new \DateTime($endDate);
        $numberOfDays   = $startDate->diff($endDate->modify('+1 days'))->days;
        $traveller      = $this->travellerRepository->find($travellerId);
        $city           = $this->cityRepository->findOneBy(['name' => $location]);

        $allDestinationsForCity   = $this->destinationRepository->findBy([
            'city'      => $city,
        ]);

        $travelPlan = [];

        $interval = $timeAllocated / 2; // divide whole time into two hours interval

        for ($i = 0; $i < $numberOfDays; $i++) {
            $currentDay = $i > 0 ? $startDate->modify("+1 days")->format('l') : $startDate->format('l') ;

            $isOpenOnCurrentDay = 'getIsOpenOn' . $currentDay;
            $allDestinationsForCurrentDay = array_filter($allDestinationsForCity, function (Destination $destination) use ($isOpenOnCurrentDay) {
                return $destination->$isOpenOnCurrentDay();
            });

            $day = "Day " . ($i + 1);
            for ($j = 0; $j < $interval; $j++) {
                $destinationForCurrentInterval = array_filter($allDestinationsForCurrentDay, function (Destination $destination) use ($traveller) {
                    return $destination->getSector()->getName() == $traveller->getFavoriteHangoutPlace()->getName();
                });
                $encoders = array(new XmlEncoder(), new JsonEncoder());
                $normalizers = array(new GetSetMethodNormalizer());

                $serializer = new Serializer($normalizers, $encoders);
                $travelPlan[$day][] = $serializer->normalize(array_values($destinationForCurrentInterval)[0], null);
            }
        }

        return $travelPlan;
    }
}