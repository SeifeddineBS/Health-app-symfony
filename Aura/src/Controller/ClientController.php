<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(): Response
    {
        return $this->render('client/login.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }



    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;

    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/client/CreateAccount", name="ClientCreateAccount")
     */


     function ajouter(Request $request){
        $user =new User();

        $form=$this->createForm(ClientType::class,$user);

        $form->getData()->setSpecialite("NULL");
         $form->setData($form->getData());

         $form->handleRequest($request);

         $user->setPicture("default.jpg");
         $user->setRole("Client");

        if($form->isSubmitted()&&$form->isValid())
        {
            $password=$form->getData()->getPassword();


            $form->getData()->setPassword($this->encoder->encodePassword($user,$password));


            $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        }
        return $this->render( 'create_account/CreateAccount.html.twig',
            ['form'=>$form->createView()
    ]);


    }
}
