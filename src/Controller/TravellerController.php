<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}