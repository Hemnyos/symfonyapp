<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionPageController extends AbstractController
{
    #[Route('/inscription/page', name: 'app_inscription_page')]
    public function index(): Response
    {
        return $this->render('inscription_page/index.html.twig', [
            'controller_name' => 'InscriptionPageController',
        ]);
    }
}
