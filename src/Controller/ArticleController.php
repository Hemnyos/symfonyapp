<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/a', name: 'app_article')]
    public function index(ArticleRepository $articleRepository): Response
    { 
        $articles = $articleRepository->findAll();
        return $this->render('home/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }
}
