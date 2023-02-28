<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivatePageController extends AbstractController
{
    #[Route('/private/page', name: 'app_private_page')]
    public function index(): Response
    {
        return $this->render('private_page/index.html.twig', [
            'controller_name' => 'PrivatePageController',
        ]);
    }
}
