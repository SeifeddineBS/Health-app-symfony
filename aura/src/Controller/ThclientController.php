<?php

namespace App\Controller;

use App\Entity\Participationtherapie;
use App\Entity\Therapie;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThclientController extends AbstractController
{
    /**
     * @Route("/thclient", name="thclient")
     */
    public function index(): Response
    {
        return $this->render('thclient/index.html.twig', [
            'controller_name' => 'ThclientController',
        ]);
    }


    /**
     * @Route("/rejoindreth/{id}", name="rejoindreth")
     */
    public function rejoindreth(Therapie $id)
    {
        $Propoacts=new Therapie();
        $Propoacts= $this->getDoctrine()->getRepository(Therapie::class)-> find($id);
        $actrejoindre=new Participationtherapie();
        $user=new User();
        $user->setId("12345670");
        $actrejoindre->setIdTherapie($Propoacts->getId());
        $actrejoindre->setIdClient($user);

        $em = $this->getDoctrine()->getManager();
        $em->merge($actrejoindre);
        $em->flush();
        return $this->redirectToRoute("listactclient");



    }

}
