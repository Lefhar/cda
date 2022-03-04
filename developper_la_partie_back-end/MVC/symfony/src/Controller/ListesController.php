<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListesController extends AbstractController
{
    /**
     * @Route("/", name="listes")
     */
    public function index(DiscRepository $liste, ArtistRepository $MenuArtistes): Response
    {
        return $this->render('listes/index.html.twig', [
            'listes' => $liste->findAll(),
            'menu'=> $MenuArtistes->findBy([],['artistName'=>'asc'])
        ]);
    }
}
