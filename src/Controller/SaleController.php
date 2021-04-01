<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SaleController extends AbstractController
{
    /**
     * @Route("/ventes", name="sale")
     */
    public function index(): Response
    {
        $doctrine = $this->getDoctrine()->getManager();
        $propertiesissell = $doctrine->getRepository(Property::class)->findBy([
            'issale' => 1
        ]);
        // dd( $propertiesissell);
        return $this->render('sale/index.html.twig', [
            'propertiesissell' => $propertiesissell,
        ]);
    }
}
