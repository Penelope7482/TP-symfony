<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SportsController extends AbstractController
{
    /**
     * @Route("/sports", name="sports")
     */
    public function index()
    {
        return $this->render('sports/index.html.twig', [
            'controller_name' => 'SportsController',
        ]);
    }
}
