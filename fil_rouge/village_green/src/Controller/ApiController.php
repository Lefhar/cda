<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\CategoriesRepository;
use App\Repository\EmployeesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{



    /**
     * @Route("/api/produits", name="json_produits_liste",  methods={"get"})
     */
    public function produits(ProductsRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'show_product']);
    }
    /**
     * @Route("/api/produits/{id}", name="json_produits",  methods={"get"})
     */
    public function produit(Products $id): Response
    {

        return $this->json($id, 200, [], ['groups' => 'show_product']);
    }
    /**
     * @Route("/api/categorie", name="categorie", methods={"get"})
     */
    public function categorie(CategoriesRepository $repo): Response
    {
        return $this->json($repo->findAll(), 200, [], ['groups' => 'showcat']);
    }

    /**
     * @Route("/api/employee", name="employee", methods={"get"})
     */
    public function employee(EmployeesRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'showemp']);

    }
}
