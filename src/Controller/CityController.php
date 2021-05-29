<?php

namespace App\Controller;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/city_guide", name="city_guide")
     * @param Request $request
     * @return Response
     */
    public function cityGuide(Request $request, CityRepository $cityRepository): Response
    {
        $cities = $cityRepository->findBy([], ['description' => 'desc']);

        return $this->render('tim_planner/city_guide.html.twig', [
            'cities' => $cities
        ]);
    }
}