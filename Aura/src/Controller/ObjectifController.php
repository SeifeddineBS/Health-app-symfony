<?php

namespace App\Controller;

use App\Entity\Objectif;
use App\Form\ObjectifType;
use phpDocumentor\Reflection\Type;
use PhpParser\Builder\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ObjectifController extends AbstractController
{
    /**
     * @Route("/objectif", name="objectif")
     */
    public function index(): Response
    {
        return $this->render('objectif/index.html.twig', [
            'controller_name' => 'ObjectifController',
        ]);
    }
    /**
     * @Route("/objectifs", name="objectifs")
     */
    public function listObjectifs()
    {

        $res= $this->getDoctrine()->getRepository(Objectif::class)->findAll();
        return $this->render("objectif/index.html.twig",array('objectifs'=>$res));
    }

    /**
     * @Route("/ajouterObjectif", name="ajouterObjectif")
     */
    public function add(Request $request)
    {

        $res = new Objectif();
        $objectif = $this->getDoctrine()->getRepository(Objectif::class)->findAll();
        $form = $this->createForm(ObjectifType::class, $res);
        $form->add("Ajouter objectif", SubmitType::class, ['label' => 'Ajouter objectif']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($res);
            $em->flush();
            $this->addFlash('success', 'Objectif ajouté avec succès');
            return $this->redirectToRoute("objectif");
        }
        return $this->render('objectif/ajouterObjectif.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifierObjectif/{id}", name="modifierObjectif")
     */
    public function modifierObjectif(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $objectif= $this->getDoctrine()->getRepository(Objectif::class)->findAll();

        $res = $em->getRepository(Objectif::class)->find($id);
        $form = $this->createForm(ObjectifType::class, $res);


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Objectif modifié avec succès');
            return $this->redirectToRoute('objectifs');
        }
        return $this->render('objectif/modifierObjectif.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/ajouterObjectif", name="ajouterObjectif")
     */
    public function ajouterObjectif(Request $request)
    {
        $res= new Objectif();
        //OjectifPredefini pour les avoir dans une combobox
        //$objectifPred= $this->getDoctrine()->getRepository(Objectif::class)->findAll();
        $form= $this->createForm(ObjectifType::class,$res);
        $form->add("Book appoitment",SubmitType::class,['attr'=>[
            'class'=>"site-btn"
        ]]);
        $em=$this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($res);
            $em->flush();
            return $this->redirectToRoute("objectifs");
        }
        //return  $this->render("objectif/ajouterObjectif.html.twig",array("listObjectifPred"=>$objectifPred,'our_form'=>$form->createView()));
        return  $this->render("objectif/ajouterObjectif.html.twig",array('form'=>$form->createView()));
    }
    /**
     * @Route("/supprimerObjectif/{id}", name="supprimerObjectif" )
     * @Method("DELETE")
     */
    public function supprimerObjectif(Objectif $id)
    {
        //$classr= $this->getDoctrine()->getRepository(classroom::class)->find(id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Objectif supprimé avec succès');
        return $this->redirectToRoute("objectifs");

    }
}
