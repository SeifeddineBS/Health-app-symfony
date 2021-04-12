<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAccountController extends AbstractController
{
    /**
     * @Route("/createaccount", name="create_account")
     */
    public function index(): Response
    {
        return $this->render('create_account/CreateAccount.html.twig', [
            'controller_name' => 'CreateAccountController',
        ]);
    }
}
