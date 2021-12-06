<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    private $article = [
        1 => [
            "titre" => "Titre 1",
            "contenu" => "Lorem ipsum dolor sit,
             amet consectetur adipisicing elit. 
             Voluptates, officiis praesentium amet vitae perspiciatis id, 
             ducimus natus optio in molestiae, 
             placeat harum veniam eaque obcaecati tempore adipisci ratione quos ut!"
        ],
        2 => [
            "titre" => "Titre 2",
            "contenu" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error quisquam, doloribus tenetur minima recusandae amet obcaecati nisi omnis ullam accusantium quibusdam commodi iste sapiente incidunt unde dolore, sunt ducimus doloremque."
        ],
        3 => [
            "titre" => "Titre 2",
            "contenu" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit magni quisquam accusamus! Dolore rerum fugit praesentium iste fugiat voluptatem ducimus sunt sit! Doloremque nisi ratione ex quod natus impedit id."
        ]
    ];
    /**
     * @Route("/page", name="page")
     */
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return new Response("home");
    }

    // créer un deuxième route , legal, qui va afficher le texte : mentions légales du sites

    /**
     * @Route("/legal/", name="legal")
     */
    public function legal()
    {
        return new Response('Mentions légales du site');
    }

    /**
     * @Route("/toto/", name="toto")
     */
    public function toto()
    {
        return new Response('Toto est très bête.');
    }

    /**
     * @Route("/number/{id}", name="number")
     */
    public function number($id)
    {
        $this->article;
        return new Response($id);
    }
}
