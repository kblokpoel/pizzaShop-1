<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Products;
use App\Entity\Order;
use App\Entity\Size;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use App\Repository\ProductsRepository;
use App\Repository\SizeRepository;
use Doctrine\ORM\Query\Printer;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class PizzaController extends AbstractController
{
    /**
     * @Route("/home", name="categories")
     */

    public function homepage(CategoryRepository $em) {
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



    /**
     * @Route("/pizza/{slug}", name="products", methods={"GET","HEAD"})
     */
    public function categories(int $slug ,ProductsRepository $em) {

        $products = $em->findBy(array('category' => $slug));

        return $this->render('pizza/pizza.html.twig', [
            'products' => $products
        ]);

    }
    /**
     * @Route("/order/{id}", name="app_order")
     */
    public function order(Products $products, ManagerRegistry $doctrine, Request $request) {
        $product = $products->getName();
        $order = new Order();
        $order->setProduct($products);
        $form = $this->createForm(OrderType::class, $order);
        $order->setStatus('pending');
        $entityManager = $doctrine->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('categories');
        }
        return $this->renderForm('pizza/order.html.twig',[
            'form' => $form,
            'pizza' => $product
        ]);
    }

    /**
     * @Route("/orders")
     */
    public function orders(OrderRepository $orders, SizeRepository $sizes, ProductsRepository $products): Response {
        $order = $orders->findAll();

        return $this->render('pizza/orders.html.twig', [
            'order' => $order,
        ]);
    }

    /**
     * @Route("/contact")
     */

    public function contact(): Response {
        return $this->render('pizza/contact.html.twig', [

        ]);
    }


}