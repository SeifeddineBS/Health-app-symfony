<?php

namespace App\Controller;

use App\Entity\Objectif;
use App\Entity\ObjectifPred;
use App\Form\MailObjectifType;
use App\Form\ObjectifPredType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class ObjectifPredController extends AbstractController
{
    /**
     * @Route("/objectifpred", name="objectifpred")
     */
    public function index(): Response
    {
        return $this->render('objectif_pred/index.html.twig', [
            'controller_name' => 'ObjectifPredController',
        ]);
    }
    /**
     * @Route("/objectifspred", name="objectifspred")
     */
    public function listObjectifs()
    {

        $res= $this->getDoctrine()->getRepository(ObjectifPred::class)->findAll();
        return $this->render("objectif_pred/index.html.twig",array('objectifs'=>$res));
    }

    /**
     * @Route("/ajouterObjectifPred", name="ajouterObjectifPred")
     */
    public function add(Request $request)
    {

        $res = new ObjectifPred();
        $objectif = $this->getDoctrine()->getRepository(ObjectifPred::class)->findAll();
        $form = $this->createForm(ObjectifPredType::class, $res);
        $form->add("Ajouter objectif", SubmitType::class, ['label' => 'Ajouter objectif']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($res);
            $em->flush();
            $this->addFlash('success', 'Objectif ajouté avec succès');
            return $this->redirectToRoute("objectifspred");
        }
        return $this->render('objectif_pred/ajouterObjectifPred.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifierObjectifPred/{id}", name="modifierObjectifPred")
     */
    public function modifierObjectif(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $objectif= $this->getDoctrine()->getRepository(ObjectifPred::class)->findAll();

        $res = $em->getRepository(ObjectifPred::class)->find($id);
        $form = $this->createForm(ObjectifPredType::class, $res);


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Objectif modifié avec succès');
            return $this->redirectToRoute('objectifspred');
        }
        return $this->render('objectif_pred/modifierObjectifPred.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/ajouterObjectifPred", name="ajouterObjectifPred")
     */
    public function ajouterObjectif(Request $request)
    {
        $res= new ObjectifPred();
        $form= $this->createForm(ObjectifPredType::class,$res);
        $em=$this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($res);
            $em->flush();
            return $this->redirectToRoute("objectifspred");
        }
        return  $this->render("objectif_pred/ajouterObjectifPred.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/supprimerObjectifPred/{id}", name="supprimerObjectifPred" )
     * @Method("DELETE")
     */
    public function supprimerObjectif(ObjectifPred $id)
    {
        //$classr= $this->getDoctrine()->getRepository(classroom::class)->find(id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Objectif supprimé avec succès');
        return $this->redirectToRoute("objectifspred");

    }

    /**
     * @Route("/objectifsClients", name="objectifsClients")
     */
    public function objectifsClients(Request $request)
    {
        $res= $this->getDoctrine()->getRepository(Objectif::class)->findAll();
        if($request->isMethod("POST")){
            $desc =$request->get('description');
            $res= $this->getDoctrine()->getRepository(Objectif::class)->findBy(array('description'=>$desc));
        }
        return $this->render("objectif_pred/objectifsClients.html.twig",array('objectifs'=>$res));
    }

    /**
     * @Route("/mailObjectif", name="mailObjectif")
     */
    public function mailObjectif(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(MailObjectifType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $message = (new \Swift_Message('Bravoooo!!!!!! Vous avez terminé cet objectif.'))
            ->setFrom($contact['email'])
                ->setTo('chirinenasri13@gmail.com')
                ->setBody(
                    $this->renderView(
                        'objectif_pred/mailContact.html.twig', compact('contact')
                    ),
                    'text/html'
                );
            $mailer->send($message);
            return $this->redirectToRoute("objectifsClients");
        }
        return $this->render("objectif_pred/mailObjectif.html.twig",array('MailObjectifForm'=>$form->createView()));
    }

    /**
     * @Route("/triObjectifPredRep", name="triObjectifPredRep")
     */
    public function triObjectifPredRep()
    {

        $res= $this->getDoctrine()->getRepository(ObjectifPred::class)->listObjOrderByDuree();
        return $this->render("objectif_pred/index.html.twig",array('objectifs'=>$res));
    }
    /**
     * @Route("/triObjectifPredDesc", name="triObjectifPredDesc")
     */
    public function triObjectifPredDesc()
    {

        $res= $this->getDoctrine()->getRepository(ObjectifPred::class)->listObjOrderByDesc();
        return $this->render("objectif_pred/index.html.twig",array('objectifs'=>$res));
    }

}
