<?php

namespace App\Controller\Front\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="article")
     */
    public function index(): Response
    {
        return $this->render('Front/Home/article.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
