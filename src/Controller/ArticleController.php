<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * On préfixe toutes les routes du controller par "/articles"
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * Afficher tous les articles
     * 
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(Request $request)
       
    {
       
        // On importe le repository de l'entity Article
       $articleRepository = $this->getDoctrine()->getRepository(Article::class);

        // Tous les articles
       $articles = $articleRepository->findAll();
   
        return $this->render('/article/index.html.twig', [
         'articles' => $articles
       ]);
    }
   /**
     * Afficher le formulaire de création d'un article
     * 
     * @Route("/create", name="article_create", methods={"GET"})
     */
    public function create()
    {
        return $this->render("/article/create.html.twig");
    }

    /**
     * Affficher un article
     * 
     * @Route("/{article}", name="article_show", methods={"GET"})
     */
    public function show($article)
    {
  //      $articleRepository = $this->getDoctrine()->getRepository(Article::class);
  //      $article = $articleRepository->find($article);
  //      return $article;
        return $this->render("/article/show.html.twig");
    }
 
    /**
     * Traiter le formulaire de création d'un article
     * 
     * @Route("/", name="article_new", methods={"POST"})
     */
    public function new()
    {
        // On créée un nouvel object Article
        $article = new Article();
        $article->setTitle($_POST['title']);
        $article->setContent($_POST['content']);
        $article->setShortContent($_POST['short_content']);

        // On récupère l'EntityManager du service Doctrine :
        // Notez que le code est plus court que dans l'expliation ci-dessus !
        $manager = $this->getDoctrine()->getManager();

        // On donne l'object en gestion à Doctrine pour qu'il "persiste" l'object, c'est à dire qu'il prépare la requête
        $manager->persist($article);

        // On execute effectivement la requête :
        $manager->flush();
        return $this->redirectToRoute("article_index");
    }
}
