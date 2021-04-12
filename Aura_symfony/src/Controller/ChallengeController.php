<?php

namespace App\Controller;

use App\Entity\Challenge;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class ChallengeController extends AbstractController
{
   

    /**
     *@Route("/",name="challenge_list")
     */
     
  public function home()
  {
    //récupérer tous les articles de la table article de la BD
    // et les mettre dans le tableau $articles
    $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findAll();
    return  $this->render('challenge/index.html.twig',['challenges' => $challenges]);  
  }

  /**
      * @Route("/challenge/save")
      */
      public function save() {
        $entityManager = $this->getDoctrine()->getManager();
 
        $challenge = new Challenge();
        $challenge->setTitre('challenge 3');
        $challenge->setType('valide');
        //$challenge->setDateDebut('2021-12-04');
       // $challenge->setDateFin('2021-12-05');
        $challenge->setDescription('hello yoga time');
        $challenge->setIdNiveau(1);

       
        $entityManager->persist($challenge);
        $entityManager->flush();
 
        return new Response('challenge enregisté avec id   '.$challenge->getId());
      }


      /**
     * @Route("/challenge/new", name="new_challenge")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
        $challenge = new Challenge();
 
        $challenge->setNbParticipants(0);
       
        $form = $this->createFormBuilder($challenge)
          ->add('titre', TextType::class)
          ->add('type', TextType::class)
          ->add('description', TextType::class)
          ->add('date_debut', DateTimeType::class ,[
            'required' => true,
            'html5'=>false,
            'label' => 'Date de debut',
           //'widget' => "single_text",
            //'format' => 'dd-MM-yyyy'

         
        ] )
          ->add('date_fin', DateTimeType::class ,[
            'required' => true,
            'html5'=>false,
            'label' => 'Date de fin',
            //'widget' => "single_text",
            //'format' => 'dd-MM-yyyy'
            
         
        ])
          ->add('id_niveau', TextType::class)
          
         
          ->add('save', SubmitType::class, array(
            'label' => 'Créer')
          )->getForm();
          
  
        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
          $challenge = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($challenge);
          $entityManager->flush();
  
          return $this->redirectToRoute('challenge_list');
        }
        return $this->render('challenge/new.html.twig',['form' => $form->createView()]);
    }






     /**
     * @Route("/challenge/{id}", name="challenge_show")
     */
    public function show($id) {
        $challenge = $this->getDoctrine()->getRepository(Challenge::class)->find($id);
  
        return $this->render('challenge/show.html.twig', array('challenge' => $challenge));
      }

       /**
     * @Route("/challenge/edit/{id}", name="edit_challenge")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
        $challenge = new Challenge();
        $challenge = $this->getDoctrine()->getRepository(Challenge::class)->find($id);
  
        $form = $this->createFormBuilder($challenge)
          ->add('titre', TextType::class)
          ->add('type', TextType::class)
          ->add('description', TextType::class)
          ->add('date_debut', DateTimeType::class ,[
            //'required' => true,
            'html5'=>false,
            'label' => 'Date de debut',
           'widget' => "single_text"
           //,
            //'format' => 'dd-MM-yyyy'

         
        ] )
          ->add('date_fin', DateTimeType::class ,[
           // 'required' => true,
            'html5'=>false,
            'label' => 'Date de fin',
            'widget' => "single_text"
            //,
            //'format' => 'dd-MM-yyyy'
            
         
        ])
          ->add('id_niveau', TextType::class)
          
          ->add('save', SubmitType::class, array(
            'label' => 'Modifier'         
          ))->getForm();
  
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          return $this->redirectToRoute('challenge_list');
        }
  
        return $this->render('challenge/edit.html.twig', ['form' => $form->createView()]);
      }

       /**
     * @Route("/challenge/delete/{id}",name="delete_challenge")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $challenge = $this->getDoctrine()->getRepository(Challenge::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($challenge);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();

        return $this->redirectToRoute('challenge_list');
      }

}
