<?php

namespace App\Controller;

use App\Entity\TravelPlan;
use App\Form\TravelPlannerFormType;
use App\Repository\TravelPlanRepository;
use App\Service\TravellerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route(name="index", path="/")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->render('tim_planner/index.html.twig');
    }

    /**
     * @Route("/about_us", name="about")
     * @param Request $request
     * @return Response
     */
    public function about(Request $request): Response
    {
        return $this->render('tim_planner/about_us.html.twig');
    }

    /**
     * @Route("/media", name="media")
     * @param Request $request
     * @return Response
     */
    public function media(Request $request): Response
    {
        return $this->render('tim_planner/media.html.twig');
    }

    /**
     * @Route("/advertise", name="advertise")
     * @param Request $request
     * @return Response
     */
    public function advertise(Request $request): Response
    {
        return $this->render('tim_planner/advertise.html.twig');
    }

    /**
     * @Route("/how_it_works", name="how_it_works")
     * @param Request $request
     * @return Response
     */
    public function howItWorks(Request $request): Response
    {
        return $this->render('tim_planner/how_it_works.html.twig');
    }

    /**
     * @Route("/latest_news", name="latest_news")
     * @param Request $request
     * @return Response
     */
    public function latestNews(Request $request): Response
    {
        return $this->render('tim_planner/latest_news.html.twig');
    }

    /**
     * @Route("/travel_planner", name="travel_planner")
     * @param Request $request
     * @param TravellerService $travellerService
     * @return Response
     */
    public function travelPlanner(Request $request, TravellerService $travellerService): Response
    {
        $travelPlan = new TravelPlan();
        $travelPlanForm = $this->createForm(TravelPlannerFormType::class, $travelPlan);
        $travelPlanForm->handleRequest($request);

        if ($travelPlanForm->isSubmitted() && $travelPlanForm->isValid()) {
            $location = $request->get('travel_planner_form')['location'];

            $travelPlan = $travellerService->getAndSaveTravelPlan($travelPlan, $location);

            return $this->redirectToRoute('travel_plan', [
                'id' => $travelPlan->getId()
            ]);
        }
        return $this->render('tim_planner/travel_planner.html.twig', [
            'form' => $travelPlanForm->createView()
        ]);
    }

    /**
     * @Route("/special_offer", name="special_offer")
     * @param Request $request
     * @return Response
     */
    public function specialOffer(Request $request): Response
    {
        return $this->render('tim_planner/special_offer.html.twig');
    }

    /**
     * @Route("/special_offer_details", name="special_offer_details")
     * @param Request $request
     * @return Response
     */
    public function specialOfferDetails(Request $request): Response
    {
        return $this->render('tim_planner/special_offer_details.html.twig');
    }

    /**
     * @Route("/message_sent", name="message_sent")
     * @param Request $request
     * @return Response
     */
    public function messageSent(Request $request): Response
    {
        return $this->render('tim_planner/message_sent.html.twig');
    }

    /**
     * @Route("/saved", name="saved")
     * @param Request $request
     * @return Response
     */
    public function saved(Request $request): Response
    {
        return $this->render('tim_planner/saved.html.twig');
    }

    /**
     * @Route("/thank_you", name="thank_you")
     * @param Request $request
     * @return Response
     */
    public function thankYou(Request $request): Response
    {
        return $this->render('tim_planner/thank_you.html.twig');
    }

    /**
     * @Route("/thank_you_comments", name="thank_you_comments")
     * @param Request $request
     * @return Response
     */
    public function thankYouComments(Request $request): Response
    {
        return $this->render('tim_planner/thankyou_comments.html.twig');
    }
}