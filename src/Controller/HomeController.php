<?php

namespace App\Controller;

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
     * @Route("/contact_us", name="contact")
     * @param Request $request
     * @return Response
     */
    public function contact(Request $request): Response
    {
        return $this->render('tim_planner/contact_us.html.twig');
    }

    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        return $this->render('tim_planner/login.html.twig');
    }

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {
        return $this->render('tim_planner/register.html.twig');
    }

    /**
     * @Route("/business_register", name="business_register")
     * @param Request $request
     * @return Response
     */
    public function businessRegister(Request $request): Response
    {
        return $this->render('tim_planner/business_register.html.twig');
    }

    /**
     * @Route("/travellers_registration", name="travellers_registration")
     * @param Request $request
     * @return Response
     */
    public function travellersRegistration(Request $request): Response
    {
        return $this->render('tim_planner/travellers_registration.html.twig');
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
     * @return Response
     */
    public function travelPlanner(Request $request): Response
    {
        return $this->render('tim_planner/travel_planner.html.twig');
    }

    /**
     * @Route("/city_guide", name="city_guide")
     * @param Request $request
     * @return Response
     */
    public function cityGuide(Request $request): Response
    {
        return $this->render('tim_planner/city_guide.html.twig');
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