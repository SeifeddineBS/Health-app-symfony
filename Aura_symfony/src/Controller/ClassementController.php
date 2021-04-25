<?php

namespace App\Controller;

use App\Entity\Classement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ClassementController extends AbstractController
{
   
     /**
     *@Route("/classement/home",name="classement_list")
     */
  public function home()
    {
      //récupérer tous les classements de la table classement de la BD
      // et les mettre dans le tableau $articles
      $classements= $this->getDoctrine()->getRepository(Classement::class)->findAll();
      return  $this->render('classement/show.html.twig',['classements' => $classements]);  
    }
     /**
     *@Route("/classement/homeAdmin",name="classement_list_admin")
     */
  public function homeAdmin()
  {
    //récupérer tous les classements de la table classement de la BD
    // et les mettre dans le tableau $articles
    $classements= $this->getDoctrine()->getRepository(Classement::class)->findAll();
    return  $this->render('classement/showAdmin.html.twig',['classements' => $classements]);  
  }
  
    /**
        * @Route("/classement/save")
        */
       // public function save() {
        //  $entityManager = $this->getDoctrine()->getManager();
   
         // $classement = new Classement();
         /* $classement->setTitre('challenge 3');
          $classement->setType('valide');
         
          $classement->setDescription('hello yoga time');
          $classement->setIdNiveau(1);
  
         
          $entityManager->persist($classement);
          $entityManager->flush();*/
   
          //return new Response('challenge enregisté avec id   '.$classement->getId());
      //  }
  
  
        /**
       * @Route("/classement/new", name="new_classement")
       * Method({"GET", "POST"})
       */
      public function new(Request $request) {
          $classement = new Classement();
   
          $classement->setNbPoints(0);
          
         
          $form = $this->createFormBuilder($classement)
            ->add('id_client', TextType::class)
            ->add('id_niveau', TextType::class)
            ->add('position', TextType::class)
            
           
            
           
            ->add('save', SubmitType::class, array(
              'label' => 'Créer')
            )->getForm();
            
    
          $form->handleRequest($request);
    
          if($form->isSubmitted() && $form->isValid()) {
            $classement = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classement);
            $entityManager->flush();
    
            return $this->redirectToRoute('classement_list');
          }
          return $this->render('classement/new.html.twig',['form' => $form->createView()]);
      }
  
  
  
  
  
  
       /**
       * @Route("/classement/{id}", name="classement_show")
       */
      public function show($id) {
          $classement = $this->getDoctrine()->getRepository(Classement::class)->find($id);  
          return $this->render('classement/show.html.twig', array('classement' => $classement));
        }
  
         /**
       * @Route("/classement/edit/{id}", name="edit_classement")
       * Method({"GET", "POST"})
       */
      public function edit(Request $request, $id) {
          $classement = new Classement();
          $classement = $this->getDoctrine()->getRepository(Classement::class)->find($id);
          
          $form = $this->createFormBuilder($classement)
          ->add('id_client', TextType::class)
          ->add('id_niveau', TextType::class)
          ->add('position', TextType::class)
          ->add('nb_points', TextType::class)
            
            ->add('save', SubmitType::class, array(
              'label' => 'Modifier'         
            ))->getForm();
    
          $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid()) {
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
    
            return $this->redirectToRoute('classement_list');
          }
    
          return $this->render('classement/edit.html.twig', ['form' => $form->createView()]);
        }
  
         /**
       * @Route("/classement/delete/{id}",name="delete_classement")
       * @Method({"DELETE"})
       */
      public function delete(Request $request, $id) {
          $classement = $this->getDoctrine()->getRepository(Classement::class)->find($id);
    
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->remove($classement);
          $entityManager->flush();
    
          $response = new Response();
          $response->send();
  
          return $this->redirectToRoute('classement_list');
        }
}
