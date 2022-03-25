<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    private $productRepository;

    public function __construct (ProductRepository $productRepository){

        $this->productRepository = $productRepository;
    }

    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();


        return $this->render('default/index.html.twig', [
            'products' => $products,
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contactForm()
    {
        return $this->render('default/contact.html.twig');
    }

    #[Route('/terms', name: 'terms')]
    public function termsOfUse()
    {
        return $this->render('default/terms.html.twig');
    }

    #[Route('/conditions', name: 'conditions')]
    public function conditions()
    {
        return $this->render('default/conditions.html.twig');
    }
}
