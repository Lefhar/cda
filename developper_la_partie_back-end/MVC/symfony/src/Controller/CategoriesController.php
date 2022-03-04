<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="categories")
     */
    public function index(DiscRepository $liste, $id, ArtistRepository $MenuArtistes): Response
    {
        return $this->render('categories/index.html.twig', [
            'listes' => $liste->findBy(['artists' => $id]),
            'menu'=> $MenuArtistes->findBy([],['artistName'=>'asc'])
        ]);
    }
}
