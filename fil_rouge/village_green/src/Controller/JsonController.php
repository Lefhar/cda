<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class JsonController extends AbstractController
{
    /**
     * @Route("/json/produits", name="json")
     */
    public function produits(ProductsRepository $repo,SerializerInterface  $serializer)
    {

        $produit = $repo->findAll();
       // $postnormaliser = $normalizable->normalize($produit,'json');


        $response = $serializer->serialize(
            $produit,
            'json',
            ['groups' => 'show_product']
        );

     //   $response = $serializer->serialize($repo->findAll(),'json', ['groups' => ['normal']]);
   //     $response = $serializer->serialize($postnormaliser,'json', ['groups' => ['normal']]);
        //dd($response);
        return new Response($response);
      //  return $response;
//        dump($repo->findAll());
     //   return new JsonResponse([$repo->findAll()]);
//        return $this->json([
//            $serializer->encode($repo->findAll(),'json') ]);
    }
}
