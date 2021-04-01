<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RentalController extends AbstractController
{
    /**
     * @Route("/locations", name="rental")
     */
    public function index(): Response
    {
        $doctrine = $this->getDoctrine()->getManager();
        $propertiesisnotsell = $doctrine->getRepository(Property::class)->findBy([
            'issale' => 0
        ]);
        // dd($propertiesisnotsell);
        return $this->render('rental/index.html.twig', [
            'propertiesisnotsell' => $propertiesisnotsell
        ]);
    }
}
