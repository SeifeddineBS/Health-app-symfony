<?php

namespace App\Controller;

use App\Entity\Therapie;
use App\Form\TherapieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class TherapieController extends AbstractController
{
    /**
     * @Route("/Therapie", name="Therapie")
     */
    public function index(): Response
    {
        return $this->render('therapie/index.html.twig', [
            'controller_name' => 'TherapieController',
        ]);
    }

    /**
     * @Route("/ajouterTherapie", name="newTherapie")
     */

    public function newTherapie(Request $request)
    {

        $Therapie = new Therapie();
        $form = $this->createForm(TherapieType::class,$Therapie);
        $form->add("add", SubmitType::class);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $em->persist($Therapie);
            $em->flush();
            return $this->redirectToRoute("back");
        }
        return    $this->render("therapie/index.html.twig",['our_form'=>$form->createView()]);

    }

    /**
     * @Route("/modifierTherapie/{id}", name="modifierTherapie")
     */
    public function modifierTherapie(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Therapie= $this->getDoctrine()->getRepository(Therapie::class)->findAll();

        $res = $em->getRepository(Therapie::class)->find($id);
        $form = $this->createForm(TherapieType::class, $res);
        $form->add("update",SubmitType::class
        );

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Therapie modifié avec succès');
            return $this->redirectToRoute('back');
        }
        return $this->render('therapie/modifierTherapie.html.twig', [
            'our_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimerTherapie/{id}", name="supprimerTherapie" )
     * @Method("DELETE")
     */
    public function supprimerTherapie(Therapie $id)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Therapie supprimé avec succès');
        return $this->redirectToRoute("back");

    }
    /**
     * @Route("/listTherapie", name="listTherapie")
     */
    public function listTherapie()
    {

        $Therapies= $this->getDoctrine()->getRepository(Therapie::class)->findAll();
        return $this->render("therapie/listTherapie.html.twig",array('Therapie'=>$Therapies));
    }







    /**
     * @Route("/listthclient", name="listthclient")
     */
    public function listthclient()
    {

        $Propoacts= $this->getDoctrine()->getRepository(Therapie::class)->findAll();
        return $this->render("Activite/afficherclientActivite.html.twig",array('thclient'=>$Propoacts));
    }

    /**
     * @Route("/detailthclient/{id}", name="detailthclient")
     */
    public function detailthclient(Therapie $id)
    {

        $Propoacts= $this->getDoctrine()->getRepository(Therapie::class)-> findBy(['id'=>$id->getId()]);
        return $this->render("therapie/detailthclient.html.twig",array('thclient'=>$Propoacts));
    }







}
