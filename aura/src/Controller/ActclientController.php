<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Participationactivte;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActclientController extends AbstractController
{
    /**
     * @Route("/actclient", name="actclient")
     */
    public function index(): Response
    {
        return $this->render('actclient/index.html.twig', [
            'controller_name' => 'ActclientController',
        ]);
    }




    /**
     * @Route("/rejoindreact/{id}", name="rejoindreact")
     */
    public function rejoindreact(Activite $id)
    {
        $Propoacts=new Activite();
        $Propoacts= $this->getDoctrine()->getRepository(Activite::class)-> find($id);
        $actrejoindre=new participationactivte();
$user=new User();
$user->setId("12341231");
        $actrejoindre->setIdActivite($Propoacts);
        $actrejoindre->setIdClient($user);

        $em = $this->getDoctrine()->getManager();
        $em->merge($actrejoindre);
        $em->flush();
        return $this->redirectToRoute("listactclient");



    }





}
