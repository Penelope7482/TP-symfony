<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
   /**
    * @Route("/index", name="index")
    */

    public function index(Request $request)
       
    {
       
        // On importe le repository de l'entity Article
       $articleRepository = $this->getDoctrine()->getRepository(Article::class);

        // Tous les articles
       $articles = $articleRepository->findAll();
   
        return $this->render('/app/index.html.twig', [
         'articles' => $articles
       ]);
    }
}
