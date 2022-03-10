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
    public function produits(ProductsRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'show_product']);
    }

    /**
     * @Route("/json/categorie", name="categorie")
     */
    public function categorie(CategoriesRepository $repo): Response
    {
        return $this->json($repo->findAll(), 200, [], ['groups' => 'showcat']);
    }

    /**
     * @Route("/json/employee", name="employee")
     */
    public function employee(EmployeesRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'showemp']);

    }
}
