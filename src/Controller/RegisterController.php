<?php

namespace App\Controller;

use App\Entity\Admins;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/admin/creation", name="register")
     */
    public function index(Request $request,UserPasswordEncoderInterface $userPasswordEncoderInterface): Response
    {
        $admin = new Admins();
        $form = $this->createForm(RegisterType::class,$admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $admin = $form->getData();
            $password = $userPasswordEncoderInterface->encodePassword($admin,$admin->getPassword());
            $admin->setPassword($password);
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($admin);
            $doctrine->flush();
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
