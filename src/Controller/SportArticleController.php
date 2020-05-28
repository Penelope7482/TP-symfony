<?php

namespace App\Controller;

use App\Entity\SportArticle;
use App\Form\SportArticleType;
use App\Repository\SportArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sport/article")
 */
class SportArticleController extends AbstractController
{
    /**
     * @Route("/", name="sport_article_index", methods={"GET"})
     */
    public function index(SportArticleRepository $sportArticleRepository): Response
    {
        return $this->render('sport_article/index.html.twig', [
            'sport_articles' => $sportArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sport_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sportArticle = new SportArticle();
        $form = $this->createForm(SportArticleType::class, $sportArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sportArticle);
            $entityManager->flush();

            return $this->redirectToRoute('sport_article_index');
        }

        return $this->render('sport_article/new.html.twig', [
            'sport_article' => $sportArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sport_article_show", methods={"GET"})
     */
    public function show(SportArticle $sportArticle): Response
    {
        return $this->render('sport_article/show.html.twig', [
            'sport_article' => $sportArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sport_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SportArticle $sportArticle): Response
    {
        $form = $this->createForm(SportArticleType::class, $sportArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sport_article_index');
        }

        return $this->render('sport_article/edit.html.twig', [
            'sport_article' => $sportArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sport_article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SportArticle $sportArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sportArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sportArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sport_article_index');
    }
}
