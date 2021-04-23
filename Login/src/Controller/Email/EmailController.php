<?php

namespace App\Controller\Email;


    use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;



class EmailController extends AbstractController
{
    /**
     * @Route("/Emailcnv", name="EmailCoachnv")
     */
    public function index(): Response
    {
        return $this->render('Email/emailCoachNV.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }










}
