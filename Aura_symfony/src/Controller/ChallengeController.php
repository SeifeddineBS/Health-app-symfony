<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\Participationchallenge;
use App\Entity\Classement;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping\Id;
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
     
  public function homeClient()
  {
   
    $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findBy(['type'=>'valide']);
    return  $this->render('challenge/afficheChallenge.html.twig',['challenges' => $challenges]);  
  }
  /**
  *@Route("/challenge/coach/home",name="challenge_list_coach")
  */
  public function homeCoach()
    {
      $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findAll();
      return  $this->render('challenge/afficheCoach.html.twig',['challenges' => $challenges]);


    }
  /**
  *@Route("/challenge/coach/valide",name="challengevalide_list_coach")
  */
  public function homeCoachValide()
  {
    $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findBy(['type'=>'valide']);
    return  $this->render('challenge/valideCoach.html.twig',['challenges' => $challenges]); 

  }
  /**
  *@Route("/challenge/coach/nonValide",name="challengenonvalide_list_coach")
  */
  public function homeCoachNonValide()
  {
    $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findBy(['type'=>'null']);
    return  $this->render('challenge/nonvalideCoach.html.twig',['challenges' => $challenges]); 

  }
  



  /**
     *@Route("/challenge/admin/home",name="challenge_list_admin")
     */
     
    public function homeAdmin()
    {
      //récupérer tous les articles de la table article de la BD
      // et les mettre dans le tableau $articles
      $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findAll();
      return  $this->render('challenge/listeAdmin.html.twig',['challenges' => $challenges]);  
    }

     /**
     *@Route("/challenge/admin/listPropochallenge",name="listPropochallenge")
     */
     
    public function ShowPropoChallenge()
    {
      //récupérer tous les articles de la table article de la BD
      // et les mettre dans le tableau $articles
     
      $challenges= $this->getDoctrine()->getRepository(Challenge::class)->findBy(['type' => 'null']);
      return  $this->render('challenge/showChallengeAdmin.html.twig',['challenges' => $challenges]);  
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
          
         
          ->getForm();
          
  
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
       * @Route("/challengerejoint/{id}", name="challengerejoint_show")
       */
      public function showrejoint($id)
      {
        $challenge = $this->getDoctrine()->getRepository(Challenge::class)->find($id);
        
        return $this->render('/challenge/detailsrejoint.html.twig', array('challenge' => $challenge));

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

       /**
     * @Route("/challenge/approuveChallenge/{id}", name="approuveChallenge")
     */
    public function approuveChallenge(Challenge $id)
    {
        $Propochal=new Challenge();
        $Propochal= $this->getDoctrine()->getRepository(Challenge::class)-> find($id);
     

        $Propochal->setType('valide');
       

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Propochal);
        $entityManager->flush();
       
        $this->addFlash('success', 'le challenge est approuvé  avec succès');
        return $this->redirectToRoute("listPropochallenge");



    }

    /**
     * @Route("/rejoindreChallenge/{id}", name="rejoindreChallenge")
     */
    public function rejoindreChallenge(Challenge $id)
    {
        $challenge=new Challenge();
        $cl=new Classement();
        $participation=new Participationchallenge();
        $challenge= $this->getDoctrine()->getRepository(Challenge::class)-> find($id);
        
        $user="87654321";
       
        $participation->setIdChallenge($challenge->getId());
        $participation->setIdClient($user);
        $participation->setEtat('joined');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($participation);
        $entityManager->flush();
        $this->addFlash('success', 'le challenge est rejoint  avec succès');
        return $this->redirectToRoute("challenge_list");
    }  
    /**
    * @Route("/finirChallenge/{id}", name="finirChallenge")
    */
    public function finirChallenge(Challenge $ch)//,string $user
    {
     
       $id=$ch->getId();
      
     // $participation=new Participationchallenge();
      //$challenges= $this->getDoctrine()->getRepository(Challenge::class)-> find($id);
     $participation= $this->getDoctrine()->getRepository(Participationchallenge::class)->findOneBy(['idChallenge' => $id]);//,'idClient' => '87654321'] , null
      
       
     $entityManager = $this->getDoctrine()->getManager();
     $entityManager->remove($participation);
     $entityManager->flush();
      $this->addFlash('success', 'le challenge est fini  avec succès');

        
      

      return  $this->redirectToRoute("MesChallenges");
                    
    }  
     /**
    * @Route("/MesChallenges/", name="MesChallenges")
    */
    public function MesChallenges()//string $user
    {
     
     
      
      $s='87654321';
     // $participation=new Participationchallenge();
      //$challenges= $this->getDoctrine()->getRepository(Challenge::class)-> find($id);
      $participations= $this->getDoctrine()->getRepository(Participationchallenge::class)->findBy(['idClient' => $s ]);//$user
      $challengerejoints=array ();
      foreach($participations as $participation)
      {
        $challengerejoint= $this->getDoctrine()->getRepository(Challenge::class)-> findOneBy(['id' => $participation->getIdChallenge()]);
       
       
        array_push($challengerejoints,$challengerejoint);
      }
      

      return  $this->render('challenge/MesChallenges.html.twig',['challengerejoints' => $challengerejoints]);   
      // $this->redirectToRoute("challenge_list");
                    
    } 


}
