<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipationChallengeController extends AbstractController
{
    /**
     * @Route("/participation/challenge", name="participation_challenge")
     */
    public function index(): Response
    {
        return $this->render('participation_challenge/index.html.twig', [
            'controller_name' => 'ParticipationChallengeController',
        ]);
    }
}
