<?php

namespace App\Service;

use App\Entity\Destination;
use App\Entity\TravelPlan;
use App\Repository\CityRepository;
use App\Repository\DestinationRepository;
use App\Repository\TravellerRepository;
use App\Repository\TravelPlanRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
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
    /**
     * @var TravelPlanRepository
     */
    private $planRepository;

    public function __construct(
        TravellerRepository $travellerRepository,
        DestinationRepository $destinationRepository,
        CityRepository $cityRepository,
        TravelPlanRepository $planRepository
    ) {

        $this->travellerRepository = $travellerRepository;
        $this->destinationRepository = $destinationRepository;
        $this->cityRepository = $cityRepository;
        $this->planRepository = $planRepository;
    }

    public function getTravelPlan($startDate, $endDate, $location, $traveller, $timeAllocated): array
    {
        $startDate      = new \DateTime($startDate);
        $endDate        = new \DateTime($endDate);
        $numberOfDays   = $startDate->diff($endDate->modify('+1 days'))->days;
        $city           = $this->cityRepository->findOneBy(['name' => $location]);

        $allDestinationsForCity   = $this->destinationRepository->findBy([
            'city'      => $city,
        ]);

        // TODO: need to limit days to 5 days
        // TODO: need to limit number of hours to 12 hours

        $travelPlan = [];
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        for ($i = 0; $i < $numberOfDays; $i++) {
            $activityStartTime = 9;
            $currentDay = $i > 0 ? $startDate->modify("+1 days")->format('l') : $startDate->format('l') ;
            $dayIndex = "Day " . ($i + 1);
            // TODO: take care of destinations distances.

            $isOpenOnCurrentDay = 'getIsOpenOn' . $currentDay;
            $activitiesForCurrentDay = array_filter($allDestinationsForCity, function (Destination $destination) use ($isOpenOnCurrentDay, $traveller) {
                return $destination->$isOpenOnCurrentDay() && $destination->getSector()->getName() == $traveller->getFavoriteHangoutPlace()->getName();
            });

            $activityDuration = $timeAllocated / count($activitiesForCurrentDay); // divide whole time into two hours duration

            $activitiesForCurrentDay = $serializer->normalize(array_values($activitiesForCurrentDay), null);


            $today = new \DateTime();
            foreach ($activitiesForCurrentDay as $key => $activity) {
                $today->setTime($activityStartTime + ($key * $activityDuration),0);
                $activitiesForCurrentDay[$key]['startTime'] = $today->format('h:i A');
            }
            $travelPlan[$dayIndex] = $activitiesForCurrentDay;
        }
        return [ $travelPlan, $city ];
    }

    /**
     * @param TravelPlan $travelPlan
     * @param $location
     * @return TravelPlan
     */
    public function getAndSaveTravelPlan(TravelPlan $travelPlan, $location): TravelPlan
    {
        // TODO: Traveller should be the current logged in person
        $travelPlan->setTraveller(
            $this->travellerRepository->find(306)
        );

        list ($plan, $city) = $this->getTravelPlan(
            $travelPlan->getStartDate()->format('d-m-Y'),
            $travelPlan->getEndDate()->format('d-m-Y'),
            $location,
            $travelPlan->getTraveller(),
            $travelPlan->getTimeAllocatedPerDay()
        );

        $travelPlan->setPlan($plan);
        $travelPlan->setCity($city);
        $travelPlan->setCreatedAt(new \DateTime());
        $travelPlan->setUpdatedAt(new \DateTime());

        $this->planRepository->save($travelPlan);

        return $travelPlan;
    }
}