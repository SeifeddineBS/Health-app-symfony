<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="activite")
     */
    public function index(): Response
    {
        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
        ]);
    }

    /**
     * @Route("/ajouterActivite", name="newActivite")
     */

    public function newActivite(Request $request)
    {

        $Activite = new Activite();
        $form = $this->createForm(ActiviteType::class,$Activite);
        $form->add("add", SubmitType::class);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($Activite);
            $em->flush();
            return $this->redirectToRoute("back");
        }
        return    $this->render("Activite/index.html.twig",['our_form'=>$form->createView()]);

    }

    /**
     * @Route("/modifierActivite/{id}", name="modifierActivite")
     */
    public function modifierActivite(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Activite= $this->getDoctrine()->getRepository(Activite::class)->findAll();

        $res = $em->getRepository(Activite::class)->find($id);
        $form = $this->createForm(ActiviteType::class, $res);
        $form->add("update",SubmitType::class
        );

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Activite modifié avec succès');
            return $this->redirectToRoute('back');
        }
        return $this->render('Activite/modifierActivite.html.twig', [
            'our_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimerActivite/{id}", name="supprimerActivite" )
     * @Method("DELETE")
     */
   public function supprimerActivite(Activite $id)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Activite supprimé avec succès');
        return $this->redirectToRoute("back");

    }
    /**
     * @Route("/listActivite", name="listActivite")
     */
    public function listActivite()
    {

        $Activites= $this->getDoctrine()->getRepository(Activite::class)->findAll();
        return $this->render("Activite/listActivite.html.twig",array('Activite'=>$Activites));
    }
}
