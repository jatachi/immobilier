<?php

namespace App\Controller;

use App\Entity\Property;
use App\Entity\TypeProperty;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/type-de-propriete/{id}", name="category")
     */
    public function index($id): Response
    {
        $doctrine = $this->getDoctrine()->getManager();
        $category = $doctrine->getRepository(Property::class)->findWithidProperty($id);
        return $this->render('category/index.html.twig', [
            'properties' => $category
        ]);
    }
}
