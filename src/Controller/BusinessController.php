<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BusinessController extends AbstractController
{
    /**
     * @Route("/business/dashboard", name="business_dashboard")
     */
    public function dashboard()
    {
        dd("Business Profile page here");
    }
}