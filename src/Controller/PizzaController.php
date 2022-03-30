<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;


class PizzaController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function homepage(CategoryRepository $em) {
//        $categories = [
//            "vis",
//            "vega",
//            "vlees"
//        ];
        /** @var Category $cat */
        $categories = $em->findAll();

        return $this->render('pizza/home.html.twig', [
            'categories' => $categories
        ]);

    }

    /**
     * @Route("/aa")
     */

    public function randomPizza(): Response
    {

        $pizzas = [
            "PIZZA PEPPERONI DELUXE",
            "PIZZA PEPPERONI PARTY",
            "PIZZA VEGGI CHICKEN SUPREME",
            "PIZZA FRESH 'N TASTY",
            "PIZZA VEGERONI",
            "PIZZA MARGARITHA",
            "PIZZA HAM",
            "PIZZA FUNGHI"
        ];
        global $categories;

//        return new Response(
//            '<html><body>Lucky pizza:' . $pizzas[array_rand($pizzas)] . '</body></html>'
//        );
        return $this->render('pizza/home.html.twig', [
            'categories' => $categories
        ]);
    }
    //categories page

    /**
     * @Route("/categories/{slug}")
     */
    public function categories($slug) {
        return new Response(sprintf(
            'Future page for categories "%s"',ucwords(str_replace('-', ' ',$slug))
        ));

    }

    /**
     * @Route("/contact")
     */

    public function contact(): Response {

        return $this->render('pizza/contact.html.twig', [

        ]);
    }


}