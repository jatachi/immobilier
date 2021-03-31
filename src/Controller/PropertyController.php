<?php

namespace App\Controller;


use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @Route("/nos-proprietees", name="properties")
     */
    public function index(Request $request): Response
    {
        $propertySearch = new PropertySearch();
        $doctrine = $this->getDoctrine()->getManager();
        $form = $this->createForm(PropertySearchType::class,$propertySearch);
        $form->handleRequest($request);
        $properties= $doctrine->getRepository(Property::class)->findAll(); 
        if ($form->isSubmitted() && $form->isValid()) {
            $nom = $propertySearch->getNom(); 
            $properties = $doctrine->getRepository(Property::class)->findAll(); 
            if ($nom!="") {

                $properties = $doctrine->getRepository(Property::class)->findBy(['name' => $nom]);
            }  
            else {
                $properties = $doctrine->getRepository(Property::class)->findAll();
            }
        }
        return $this->render('property/index.html.twig', [
           'properties' => $properties,
           'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/propriete/{slug}", name="property")
     */
    public function show($slug): Response
    {
        $doctrine = $this->getDoctrine()->getManager();
        $property = $doctrine->getRepository(Property::class)->findOneBySlug($slug);
        if(!$property){
            return $this->redirectToRoute('properties');
        }
        return $this->render('property/show.html.twig', [
           'property' => $property
        ]);
    }
}
