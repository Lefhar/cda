<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Disc;
use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/details")
 */
class DetailsController extends AbstractController
{
    /**
     * @Route("/disque/{id}", name="produit")
     */
    public function index(DiscRepository $details, $id, ArtistRepository $MenuArtistes): Response
    {

        return $this->render('details/index.html.twig', [

            'produit' => $details->find($id),
            'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc'])
        ]);
    }

    /**
     * @Route("/insert/", name="produit_add")
     */
    public function add(ArtistRepository $MenuArtistes, Request $request, EntityManagerInterface $manger): Response
    {
        $erreur = '';

        if ($request->getMethod() == 'POST') {

            if (!empty($request->get('title')) &&
                !empty($request->get('year')) &&
                is_numeric($request->get('price'))&&
                !empty($request->get('label')) &&
                !empty($request->get('artist')) &&
                !empty($request->get('genre')) &&
                !empty($request->get('price')) && is_numeric($request->get('price')) &&
                !empty($request->files->get('disc_picture'))
            ) {
                $disc = new Disc();
                $artist = $MenuArtistes->find($request->get('artist'));
                //  $fichier = $request->get('disc_picture')->getData();


                $fichier = $request->files->get('disc_picture');
                //      dump($fichier);
                //     dump($fichier->getClientOriginalName());
                //    dump($fichier->getClientmimeType());//       dump($fichier->getClientlinkTarget());
                ;
                $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff");
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/', $fichier->getClientOriginalName())) {
                        $disc->setDiscTitle($request->get('title'));
                        $disc->setArtists($artist);
                        $disc->setDiscYear($request->get('year'));
                        $disc->setDiscLabel($request->get('label'));
                        $disc->setDiscGenre($request->get('genre'));
                        $disc->setDiscPrice($request->get('price'));
                        $disc->setDiscPicture($fichier->getClientOriginalName());
                        $manger->persist($disc);
                        $manger->flush();
                        return $this->redirectToRoute('listes');
                    }
                } else {
                    $erreur = 'Type de fichier non autorisé';
                }


            } else {
                $erreur = 'Tout les champs n\'ont pas été rempli correctement';
            }
        }
        return $this->render('details/add.html.twig', [


            'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc']),
            'error' => $erreur
        ]);
    }

    /**
     * @Route("/update/{id}", name="produit_update")
     */
    public function update(DiscRepository $details, $id, ArtistRepository $MenuArtistes, Request $request, EntityManagerInterface $manger): Response
    {
        $erreur = '';
        $disc = $details->find($id);
        if ($request->getMethod() == 'POST') {

            if (!empty($request->get('title') && !empty($request->get('year')) && is_numeric($request->get('year')) && is_numeric($request->get('price')))) {

                $artist = $MenuArtistes->find($request->get('artist_id'));
                //  $fichier = $request->get('disc_picture')->getData();

                $disc->setDiscTitle($request->get('title'));
                $disc->setArtists($artist);
                $disc->setDiscYear($request->get('year'));
                $disc->setDiscLabel($request->get('label'));
                $disc->setDiscGenre($request->get('genre'));
                $disc->setDiscPrice($request->get('price'));
                if (!empty($request->files->get('disc_picture'))) {
                    $fichier = $request->files->get('disc_picture');
                    //      dump($fichier);
                    //     dump($fichier->getClientOriginalName());
                    //    dump($fichier->getClientmimeType());//       dump($fichier->getClientlinkTarget());
                    ;
                    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
                    if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                        if ($fichier->move('assets/images/', $fichier->getClientOriginalName())) {
                            $disc->setDiscPicture($fichier->getClientOriginalName());
                            $manger->flush();
                            return $this->redirectToRoute('listes');
                        }
                    } else {
                        $erreur = 'Type de fichier non autorisé';
                    }
                } else {

                    $manger->flush();
                    return $this->redirectToRoute('listes');
                }


            } else {
                $erreur = 'Tout les champs n\'ont pas été rempli correctement';
            }
        }

        return $this->render('details/update.html.twig', [

            'produit' => $details->find($id),
            'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc']),
            'error' => $erreur
        ]);
    }


    /**
     * @Route("/confirmdelete/{id}", name="confirmdelete")
     */
    public function confirmdelete(DiscRepository $details, $id, Request $request, ManagerRegistry $doctrine, ArtistRepository $MenuArtistes): Response
    {
        $prod = $details->find($id);
        $entityManager = $doctrine->getManager();
        if ($request->getMethod() == 'POST') {

            if (!empty($request->get('disc_id') && !empty($request->get('confirm')) &&
                $request->get('disc_id') == $id &&
                $request->get('confirm') == "yes")) {
                $product = $entityManager->getRepository(Disc::class)->find($id);
                $entityManager->remove($product);
                $entityManager->flush();
                return $this->redirectToRoute('listes');

            }
        }


        return $this->render('details/confirmdelete.html.twig', [

            'produit' => $prod,
            'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc'])
        ]);
    }
}
