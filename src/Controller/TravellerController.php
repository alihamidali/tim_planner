<?php

namespace App\Controller;

use App\Entity\TravelPlan;
use App\Repository\TravellerRepository;
use App\Service\TravellerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
        TravellerService $travellerService,
        TravellerRepository $travellerRepository
    ) {
        $startDate      = $request->get('start_date');
        $endDate        = $request->get('end_date');
        $location       = $request->get('location');
        $travellerId    = $request->get('traveller_id');
        $timeAllocated  = $request->get('time_allocated');

        $traveller = $travellerRepository->find($travellerId);

        $travelPlan     = $travellerService->getTravelPlan($startDate, $endDate, $location, $traveller, $timeAllocated);

        return new JsonResponse($travelPlan);
    }

    /**
     * @Route("/travel_plan/{id}", name="travel_plan")
     * @ParamConverter("plan", class="App\Entity\TravelPlan")
     * @param Request $request
     * @param TravelPlan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function travelPlan(Request $request, TravelPlan $plan)
    {
        return $this->render('travellers/travel_plan.html.twig', [
            'travelPlan' => $plan
        ]);
    }
}