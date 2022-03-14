<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Employees;
use App\Entity\Products;
use App\Repository\CategoriesRepository;
use App\Repository\EmployeesRepository;
use App\Repository\LiveRepository;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/")
 */
class ApiController extends AbstractController
{


    /**
     * @Route("produits", name="ProduitsListe", methods={"get"})
     */
    public function ProduitsListe(ProductsRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'show_product']);
    }

    /**
     * @Route("produits/{id}", name="produit",  methods={"get"})
     */
    public function Produit(Products $id): Response
    {

        return $this->json($id, 200, [], ['groups' => 'show_product']);
    }

    /**
     * @Route("categorie", name="CategorieListe", methods={"get"})
     */
    public function CategorieListe(CategoriesRepository $repo): Response
    {
        return $this->json($repo->findAll(), 200, [], ['groups' => 'showcat']);
    }

    /**
     * @Route("categorie/{id}", name="categorie", methods={"get"})
     */
    public function Categorie(Categories $id): Response
    {
        return $this->json($id, 200, [], ['groups' => 'showcat']);
    }

    /**
     * @Route("employee", name="EmployeeListe", methods={"get"})
     */
    public function EmployeeListe(EmployeesRepository $repo): Response
    {

        return $this->json($repo->findAll(), 200, [], ['groups' => 'showemp']);

    }

    /**
     * @Route("employee/{id}", name="employee", methods={"get"})
     */
    public function Employee(Employees $id): Response
    {

        return $this->json($id, 200, [], ['groups' => 'showemp']);

    }

    /**
     * @Route("produits", name="InsertProduit",  methods={"post"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function InsertProduit(Request            $request, EntityManagerInterface $em,
                                  ValidatorInterface $validator, CategoriesRepository $cat, EmployeesRepository $emp): JsonResponse
    {
        try {

            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $produit = new Products();
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
     * @Route("categorie", name="InsertCategorie",  methods={"post"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function InsertCategorie(Request            $request, EntityManagerInterface $em,
                                    ValidatorInterface $validator, CategoriesRepository $cat): JsonResponse
    {
        try {

            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $categorie = new Categories();
            if ($post->parent) {
                $parent = $cat->find($post->parent);

            } else {
                $parent = null;
            }

            $categorie->setName($post->name);
            $categorie->setSouscat($parent);
            $categorie->setPicture($post->photo);


            $em->persist($categorie);
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
     * @Route("categorie/{id}", name="UpdateCategorie",  methods={"put"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function UpdateCategorie(Request            $request, Categories $id, EntityManagerInterface $em,
                                    ValidatorInterface $validator, CategoriesRepository $cat): JsonResponse
    {
        try {
            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            if ($post->parent) {
                $parent = $cat->find($post->parent);

            } else {
                $parent = null;
            }

            $id->setName($post->name);
            $id->setSouscat($parent);
            $id->setPicture($post->photo);
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
     * @Route("produits/{id}", name="UpdateProduit",  methods={"put"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function UpdateProduit(Request $request, Products $id, EntityManagerInterface $em,
                                  ValidatorInterface $validator, CategoriesRepository $cat, EmployeesRepository $emp): JsonResponse
    {
        try {
            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $categorie = $cat->find($post->catprod->id);
            $employee = $emp->find($post->emp->id);

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
    /**
     * @Route("produits", name="DeleteProduit",  methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function DeleteProduit(Request $request, ProductsRepository $prod, EntityManagerInterface $em, ValidatorInterface $validator): JsonResponse
    {
        try {
            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $product = $prod->find($post->id);
            if(file_exists('assets/src/'.$product->getPhoto())){
                unlink('assets/src/'.$product->getPhoto());
            }
            $em->remove($product);
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
     * @Route("categorie", name="DeleteCategorie",  methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function DeleteCategorie(Request $request, CategoriesRepository $cat,EntityManagerInterface $em, ValidatorInterface $validator): JsonResponse
    {
        try {
            $post = json_decode($request->getContent());

            $error = $validator->validate($post);
            if (count($error) > 0) {
                return $this->json($error, 400
                );

            }
            $categorie = $cat->find($post->id);
            if(file_exists('assets/src/'.$categorie->getPicture())){
                unlink('assets/src/'.$categorie->getPicture());
            }

            $em->remove($categorie);
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
     * @Route("files/{table}/{id}", name="UploadFile",  methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function UploadFile(Request $request, SerializerInterface $serializer, $table, $id, CategoriesRepository $cat, ProductsRepository $prod): JsonResponse
    {
        switch ($table) {

            case 'categorie';
                $photo = $cat->find($id)->getPicture();
                break;
            case 'produit';
                $photo = $prod->find($id)->getPhoto();

                break;
            default;
                $photo = $prod->find($id)->getPhoto();

        }
        try {
            $fichier = $request->files->get('photo');
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff");
            if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/src/', $photo)) {
                    return $this->json(["id" => $id, "table" => $table, "photo" => $photo], 201, [], ['groups' => "show_products"]);
                }
            } else {
                return $this->json(["id" => $id, "table" => $table, "photo" => $photo, 'status' => 400,
                    'message' => "fichier non autorisé"], 400, []);
            }
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400
            );
        }
        return $this->json(['status' => 400,
            'message' => "fichier non autorisé ou non reçu"], 400, []);
    }


}
