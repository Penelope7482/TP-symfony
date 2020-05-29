<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
  //  /**
  //   * Afficher le formulaire de création d'un article
  //   * 
  //   * @Route("/create", name="article_create", methods={"GET"})
  //   */
  //  public function create()
  //  {
  //      return $this->render("/article/create.html.twig");
  //  }
//
 

 //  /**
 //   * Traiter le formulaire de création d'un article
 //   * 
 //   * @Route("/", name="article_new", methods={"POST"})
 //   */
 //  public function new()
 //  {
 //      // On créée un nouvel object Article
 //      $article = new Article();
 //      $article->setTitle($_POST['title']);
 //      $article->setContent($_POST['content']);
 //      $article->setShortContent($_POST['short_content']);

 //      // On récupère l'EntityManager du service Doctrine :
 //      // Notez que le code est plus court que dans l'expliation ci-dessus !
 //      $manager = $this->getDoctrine()->getManager();

 //      // On donne l'object en gestion à Doctrine pour qu'il "persiste" l'object, c'est à dire qu'il prépare la requête
 //      $manager->persist($article);

 //      // On execute effectivement la requête :
 //      $manager->flush();
 //      return $this->redirectToRoute("article_index");
 //  }

/**
* @Route("/new", name="product_new", methods={"GET","POST"})
*/
public function new(Request $request): Response
    {

    // CAS GET (affichage) :
        // On prépare l'article à créer avec le formulaire
        $article = new Article();

        // On prépare le formulaire : on utilise le service createForm avec en arguments: le formulaire généré (ArticleType) et l'objet traité par le formulaire ($article)
        $form = $this->createForm(ArticleType::class, $article);

    // CAS POST (traitement) :
        // On indique au formulaire de traiter la requête
        $form->handleRequest($request);

        // Si le formulaire a été envoyé et est valide, on le traite
        if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre la donnée
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            // On redirige vers la page article_index
            return $this->redirectToRoute('article_index');
        }

    // CAS GET ou CAS POST SI FORMULAIRE INVALIDE (if ci-dessus) :
    // On affiche le formulaire
        return $this->render('article/create.html.twig', [
            'product' => $article,
            'form' => $form->createView(),
        ]);
    }

 //  /**
 //   * @Route("/{article}/edit/", name="article_edit", methods={"GET"})
 //   * 
 //   */
 //  public function edit($article)
 //  {
 //      $articleRepository = $this->getDoctrine()->getRepository(Article::class);
 //      $article = $articleRepository->find($article);

 //      return $this->render("/article/create.html.twig", [
 //          'article' => $article
 //      ]);
 //  }

 //  /**
 //   * @Route("/{article}/edit", name="article_update", methods={"POST"})
 //   */
 //  public function update(Request $request, Article $article)
 //  {


 //      $articleRepository = $this->getDoctrine()->getRepository(Article::class);
 //      $article = $articleRepository->find($article);
 //      $article->setTitle($_POST['title']);
 //      $article->setContent($_POST['content']);
 //      $article->setShortContent($_POST['short_content']);
 //      // On récupère l'EntityManager du service Doctrine :
 //      // Notez que le code est plus court que dans l'expliation ci-dessus !
 //      $manager = $this->getDoctrine()->getManager();

 //      // On donne l'object en gestion à Doctrine pour qu'il "persiste" l'object, c'est à dire qu'il prépare la requête
 //      $manager->persist($article);

 //      // On execute effectivement la requête :
 //      $manager->flush();
 //      return $this->redirectToRoute("article_index");
 //  }


/**
* @Route("/{article}/update", name="product_update", methods={"GET","POST"})
*/
public function update(Request $request, Article $article): Response
    {

    // CAS GET (affichage) :
        // On prépare l'article à créer avec le formulaire
        

        // On prépare le formulaire : on utilise le service createForm avec en arguments: le formulaire généré (ArticleType) et l'objet traité par le formulaire ($article)
        $form = $this->createForm(ArticleType::class, $article);

    // CAS POST (traitement) :
        // On indique au formulaire de traiter la requête
        $form->handleRequest($request);

        // Si le formulaire a été envoyé et est valide, on le traite
        if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre la donnée
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            // On redirige vers la page article_index
            return $this->redirectToRoute('article_index');
        }

    // CAS GET ou CAS POST SI FORMULAIRE INVALIDE (if ci-dessus) :
    // On affiche le formulaire
        return $this->render('article/create.html.twig', [
            'product' => $article,
            'form' => $form->createView(),
        ]);
    }



   /**
    * @Route("/{article}/delete", name="article_delete", methods={"POST"})
    * 
    */
   public function delete(Request $request, Article $article)
   {
     $manager = $this->getDoctrine()->getManager();
       $manager->remove($article);
       $manager->flush();
       return $this->redirectToRoute("article_index");
   }

 

       /**
     * Afficher un article
     * 
     * @Route("/{article}", name="article_show", methods={"GET"})
     */
    public function show($article)
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepository->find($article);

        return $this->render("/article/show.html.twig", [
            'article' => $article
        ]);
    }
}
