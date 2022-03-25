<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaginationProductController extends AbstractController
{
    #[Route('/pagination/product', name: 'pagination_product')]
    public function index(ProductRepository $productRepository): Response
    {
        $nbProduct = $productRepository->count([]);

        dd($nbProduct);
        $products = $productRepository->findAll();

        return $this->render('pagination_product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
