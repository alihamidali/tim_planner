<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact_us", name="contact", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function contact(Request $request): Response
    {
        return $this->render('tim_planner/contact_us.html.twig');
    }
}