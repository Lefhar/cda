<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Repository\CustomersRepository;
use App\Repository\OrdersRepository;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends AbstractController
{
    /**
     * @Route("/facture/pdf/{order}", name="facturePdf")
     */

    public function facturePdf(Pdf $knpSnappyPdf,  Orders $order, CustomersRepository $user): PdfResponse
    {
        $html = $this->renderView('facture/index.html.twig', array(
            'order'  => $order
        ));
        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'facture-numero-'.$order->getId().'.pdf'
        );
    }
    /**
     * @Route("/facture/vu/{order}", name="facture")
     */

    public function facture(  Orders $order, CustomersRepository $user)
    {


        return $this->render('facture/index.html.twig', [
                'order'  => $order
            ]
        );
    }

}