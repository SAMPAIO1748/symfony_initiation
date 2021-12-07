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
             placeat harum veniam eaque obcaecati tempore adipisci ratione quos ut!",
            "id" => 1
        ],
        2 => [
            "titre" => "Titre 2",
            "contenu" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error quisquam, doloribus tenetur minima recusandae amet obcaecati nisi omnis ullam accusantium quibusdam commodi iste sapiente incidunt unde dolore, sunt ducimus doloremque.",
            "id" => 2
        ],
        3 => [
            "titre" => "Titre 3",
            "contenu" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit magni quisquam accusamus! Dolore rerum fugit praesentium iste fugiat voluptatem ducimus sunt sit! Doloremque nisi ratione ex quod natus impedit id.",
            "id" => 3
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

    /**                // wildcard
     * @Route("/number/{id}", name="number")
     */
    public function number($id)
    {
        $this->article;
        return new Response($id);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function articleShow($id)
    {

        if (array_key_exists($id, $this->article)) {
            $article = $this->article[$id];
            return $this->render('article.html.twig', ['article' => $article]);
        } else {
            return $this->redirectToRoute('article_list');
        }
    }

    // Modifier la fonction articleShow pour retourné une vue qui affiche le titre 
    // de l'article séléctionné grâce à l'id  et son contenue. 

    // route poker avec wildcard si la wild card est inférieur à 18 retourner le texte
    // "vous n'êtes pas autorisé ici" et si la wildcard est supérieur ou égale à 18 
    // retourner le texte "Vous êtes autorisé".

    /**               //wildcard
     * @Route("/poker/{age}", name="poker")
     */
    public function poker($age)
    {
        if ($age < 18) {
            // fonction render permet de renvoyer une page twig qui sera traduite en html
            return $this->render("enfant.html.twig", ['age' => $age]);
        } else {
            return $this->render("adulte.html.twig", ['age' => $age]);
        }
    }



    // modifier la fonction poker pour retourné des vues où s'affiche l'âge avec le message 
    // adéquat et une image

    /**
     * @Route("/hello/", name="hello")
     */
    public function hello()
    {
        return $this->render('page.html.twig');
    }

    /**
     * @Route("/articles/", name="article_list")
     */
    public function articleList()
    {
        $articles = $this->article;

        return $this->render('articles.html.twig', ['articles' => $articles]);
    }
}
