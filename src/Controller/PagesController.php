<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PagesController extends AbstractController
{
//    /**
//     * @Route({ "fr": "/a-propos", "en": "/about-us"}, name="about")
//     */
//    public function about()
//    {
//        $response = new Response('Hello world!');
//
//        return $this->render('app/a-propos.html.twig', [
//            'response' => $response
//        ]);
//    }
//
//    /**
//     * @Route("/home", name="home")
//     */
//    public function home()
//    {
//        $pageTitle = "Mon super site";
//
//        $movies = [
//            [
//                "title" => "Inception",
//                "length" => 135,
//            ],
//            [
//                "title" => "Rocky",
//                "length" => 126,
//            ]
//        ];
//
//        return $this->render('app/home.html.twig', [
//            'pageTitle' => $pageTitle,
//            'movies' => $movies
//        ]);
//    }
//    /**
//     * @Route("/users/{userId}/books/{bookId}", name="user_book")
//     */
//    public function users(int $userId, int $bookId)
//    {
//        return new Response('Vous consultez le livre #' . $bookId . ' de l\'utilisateur numéro ' . $userId);
//    }
//
//    /**
//     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
//     */
//    public function list($page)
//    {
//        return new Response('Vous consultez la page ' . $page);
//    }
//
//    /** ou en précisant la valeur de la variable dans les param de la fonction si besoin
//
//     *public function list($page=1)
//     *{
//     *    return new Response ('Vous consultez la page '. $page);
//     *}
//     */
//
//    /**
//     * @Route("/post-user", name="create_user", methods={"POST"})
//     */
//
//    public function create(Request $request): Response
//    {
//        $request->get('name');
//        dump($request);
//        return new Response;
//    }
//    /**
//     * @Route("/show/{id}", name="show", methods={"GET"})
//     */
//
//    public function show(int $id)
//    {
//        return $this->render('app/show.html.twig', [
//            'id' => $id
//        ]);
//    }
//    /**
//     * @Route("/editcreateform", name="editcreateform")
//     *
//     */
//    public function editcreateform()
//    {
//        return $this->render('app/editcreateform.html.twig');
//    }
//
//    /**
//     * @Route("/edit", name="edit")
//     *
//     */
//    public function edit()
//    {
//        return $this->render('app/edit.html.twig');
//    }
}
