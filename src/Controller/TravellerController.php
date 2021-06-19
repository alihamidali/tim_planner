<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Repository\CityRepository;
use App\Repository\DestinationRepository;
use App\Repository\TravellerRepository;
use App\Service\TravellerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class TravellerController extends AbstractController
{
    /**
     * @Route("/traveller/dashboard", name="traveller_dashboard")
     */
    public function dashboard()
    {
        dd('Traveller Dashboard page.');
    }

    /**
     * @Route("/api/travel_planner", name="travel_planner1")
     */
    public function travelPlanner(
        Request $request,
        TravellerService $travellerService
    ) {
        $startDate      = $request->get('start_date');
        $endDate        = $request->get('end_date');
        $location       = $request->get('location');
        $travellerId    = $request->get('traveller_id');
        $timeAllocated  = $request->get('time_allocated');

        $travelPlan     = $travellerService->getTravelPlan($startDate, $endDate, $location, $travellerId, $timeAllocated);

        return new JsonResponse($travelPlan);
    }

    /**
     * @Route("/travel_plan", name="travel_plan")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function travelPlan(Request $request)
    {
        return $this->render('travellers/travel_plan.html.twig');
    }
}