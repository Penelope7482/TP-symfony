<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Driver\SQLSrv\LastInsertId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
   /**
    * @Route("/index", name="index")
    */

    public function index(Request $request, ArticleRepository $articleRepository)
       
    {
       
       // Tous les articles
       $articles = $articleRepository->findByLastFive();
   
        return $this->render('/app/index.html.twig', [
         'articles' => $articles
       ]);
    }

    /**
     * @Route("/search/", name="article_searchstring")
     */
    public function searchstring(Request $request, ArticleRepository $articleRepository)
    {
      //récup la requête utilisateur
     $searchstring=$request->query->get("q");

      $articles = $articleRepository->findBySearchString($searchstring);

        return $this->render('/app/index.html.twig', [
        'articles' => $articles
      ]);
    }
}
