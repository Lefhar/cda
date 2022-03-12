<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\CategoriesRepository;
use App\Repository\EmployeesRepository;
use App\Repository\LiveRepository;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
    public function Produit(Products $id): Response
    {

        return $this->json($id, 200, [], ['groups' => 'show_product']);
    }


    /**
     * @Route("/api/produits/{id}", name="post_produits",  methods={"post"})
     */
    public function InsertProduit(Request $request, EntityManagerInterface $em,
                                  ValidatorInterface $validator, CategoriesRepository $cat, EmployeesRepository $emp): JsonResponse
    {
        try {

            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $produit= new Products();
            $categorie = $cat->find($post->catprod->id);
            $employee = $emp->find($post->emp->id);
            $produit->setName($post->name);
            $produit->setDescription($post->description);
            $produit->setPhoto($post->photo);
            $produit->setLabel($post->label);
            $produit->setRef($post->ref);
            $produit->setPrice($post->price);
            $produit->setStatus($post->status);
            $produit->setStock($post->stock);
            $produit->setCatprod($categorie);
            $produit->setEmp($employee);

            $em->persist($produit);
            $em->flush();

            return $this->json($post, 201, [], []);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400
            );
        }

    }

    /**
     * @Route("/api/produits/{id}", name="put_produits",  methods={"put"})
     */
    public function UpdateProduit(Request $request, SerializerInterface $serializer, Products $id, EntityManagerInterface $em,
                                  ValidatorInterface $validator, CategoriesRepository $cat, EmployeesRepository $emp): JsonResponse
    {
        try {
            $post = json_decode($request->getContent());
            //      $post = $serializer->deserialize($request->getContent(), Products::class, 'json');
            //  $post = json_decode($request->getContent());
            //   dd($post);
            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $categorie = $cat->find($post->catprod->id);
            $employee = $emp->find($post->emp->id);
            //  dd($cat);
//            dd($teste->name);
            $id->setName($post->name);
            $id->setDescription($post->description);
            $id->setPhoto($post->photo);
            $id->setLabel($post->label);
            $id->setRef($post->ref);
            $id->setPrice($post->price);
            $id->setStatus($post->status);
            $id->setStock($post->stock);
            $id->setCatprod($categorie);
            $id->setEmp($employee);
            $em->flush();

            return $this->json($post, 201, [], []);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400
            );
        }

    }
//    /**
//     * @Route("/api/files/{table}/{id}", name="put_produits",  methods={"put"})
//     */
//    public function PutProduit2(Request $request, SerializerInterface $serializer, $table, $id): \Symfony\Component\HttpFoundation\JsonResponse
//    {
//        try {
//
////            $post = $serializer->deserialize($request->getContent(), Products::class, 'json');
//            $post = json_decode($request->getContent());
//            dd($post);
//            return $this->json($post, 201, [], ['groups' => "show_products"]);
//        } catch (NotEncodableValueException $e) {
//            return $this->json([
//                'status' => 400,
//                'message'=>$e->getMessage()
//            ],400
//            );
//        }
//
////        re// dd($post);
//    }

    /**
     * @Route("/api/categorie", name="categorie", methods={"get"})
     */
    public function Categorie(CategoriesRepository $repo): Response
    {
        return $this->json($repo->findAll(), 200, [], ['groups' => 'showcat']);
    }

    /**
     * @Route("/api/employee", name="employee", methods={"get"})
     */
    public function Employee(EmployeesRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'showemp']);

    }
}
