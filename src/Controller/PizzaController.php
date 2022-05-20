<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Pizza;
use App\Entity\Products;
use App\Entity\Order;
use App\Entity\Size;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;
use App\Repository\SizeRepository;
use Doctrine\ORM\Query\Printer;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;


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
     * @Route("/pizza/{id}", name="app_pizza", methods={"GET","HEAD"})
     */
    public function categories(Category $category ,PizzaRepository $em) {

        $pizzas = $em->findBy(["category" => $category]);

        return $this->render('pizza/pizza.html.twig', [
            'pizzas' => $pizzas
        ]);

    }
    /**
     * @Route("/order/{id}", name="app_order")
     */
    public function order(Pizza $pizzas, ManagerRegistry $doctrine, Request $request) {
        $pizza = $pizzas->getName();
        $order = new Order();
        $order->setPizza($pizzas);
        $form = $this->createForm(OrderType::class, $order);
        $order->setStatus('pending');
        $entityManager = $doctrine->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            $this->addFlash('success', 'Uw pizza wordt bereid.');
            return $this->redirectToRoute('categories');
        }
        return $this->renderForm('pizza/order.html.twig',[
            'form' => $form,
            'pizza' => $pizza
        ]);
    }

    /**
     * @Route("/orders")
     */
    public function orders(OrderRepository $orders, SizeRepository $sizes, PizzaRepository $products    ): Response {
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