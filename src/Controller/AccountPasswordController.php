<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{
    /**
     * @Route("/admin/modifier-mon-mot-de-passe", name="account_password")
     */
    public function index(Request $request,UserPasswordEncoderInterface $userPasswordEncoderInterface): Response
    {
        $notification = null;
        $admin = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class,$admin);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $old_pwd = $form->get('old_password')->getData();

            if($userPasswordEncoderInterface->isPasswordValid($admin,$old_pwd)){
                $new_pwd = $form->get('new_password')->getData();
                $password = $userPasswordEncoderInterface->encodePassword($admin,$new_pwd);
                $admin->setPassword($password);
                $doctrine= $this->getDoctrine()->getManager();
                $doctrine->persist($admin);
                $doctrine->flush();
                $this->addFlash("success","Votre mot de passe à bien été mis à jour");
                // return $this->redirectToRoute('account');
            }
            else{
                $this->addFlash("success","Votre mot de passe n'est pas bon");
                // $notification= "Votre mot de passe n'est pas le bon ";
            }

        }
        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
