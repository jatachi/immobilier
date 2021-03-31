<?php

namespace App\Controller;

use App\Entity\Header;
use App\Entity\Presentation;
use App\Entity\Property;
use App\Entity\TypeProperty;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $doctrine = $this->getDoctrine()->getManager();
        $presentation = $doctrine->getRepository(Presentation::class)->find(1);
        $headers = $doctrine->getRepository(Header::class)->findAll();
        $properties = $doctrine->getRepository(Property::class)->findBy(['isbest' => 1]);
        $category = $doctrine->getRepository(TypeProperty::class)->findAll();
        return $this->render('home/index.html.twig',[
            'headers' => $headers,
            'properties' => $properties,
            'categories' => $category,
            'image'      => $presentation
        ]);
    }
}
