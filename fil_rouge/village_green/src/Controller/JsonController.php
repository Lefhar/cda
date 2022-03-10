<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\EmployeesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class JsonController extends AbstractController
{
    /**
     * @Route("/json/produits", name="json")
     */
    public function produits(ProductsRepository $repo,SerializerInterface  $serializer): Response
    {

        $produit = $repo->findAll();


        $response = $serializer->serialize(
            $produit,
            'json',
            ['groups' => 'show_product']
        );

        return new JsonResponse($response, 200, [],true);

    }

    /**
     * @Route("/json/categorie", name="categorie")
     */
    public function categorie(CategoriesRepository $repo,SerializerInterface  $serializer): Response
    {

        $categorie = $repo->findAll();


        $response = $serializer->serialize(
            $categorie,
            'json',
            ['groups' => 'showcat']
        );

        return new JsonResponse($response, 200, [],true);

    }
    /**
     * @Route("/json/employee", name="employee")
     */
    public function employee(EmployeesRepository $repo,SerializerInterface  $serializer): Response
    {

        $employee = $repo->findAll();


        $response = $serializer->serialize(
            $employee,
            'json',
            ['groups' => 'showemp']
        );

        return new JsonResponse($response, 200, [],true);

    }
}
