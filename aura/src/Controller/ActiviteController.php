<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Participationactivte;
use App\Entity\Propoact;
use App\Entity\Therapie;
use App\Entity\User;
use App\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
        if ($form->isSubmitted()&& $form->isValid()) {
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












    /**
     * @Route("/ajouterPropoact", name="newPropoact")
     */

    public function newPropoact(Request $request)
    {

        $Propoact = new Propoact();
        $form = $this->createForm(ActiviteType::class,$Propoact);
        $form->add("add", SubmitType::class);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $em->persist($Propoact);
            $em->flush();
            return $this->redirectToRoute("back");
        }
        return    $this->render("Activite/ajouterpropoact.html.twig",['our_form'=>$form->createView()]);

    }

    /**
     * @Route("/modifierPropoact/{id}", name="modifierPropoact")
     */
    public function modifierPropoact(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Propoact= $this->getDoctrine()->getRepository(Propoact::class)->findAll();

        $res = $em->getRepository(Propoact::class)->find($id);
        $form = $this->createForm(ActiviteType::class, $res);
        $form->add("update",SubmitType::class
        );

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'Propoact modifié avec succès');
            return $this->redirectToRoute('back');
        }
        return $this->render('Activite/modifierPropoact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimerPropoact/{id}", name="supprimerPropoact" )
     * @Method("DELETE")
     */
    public function supprimerPropoact(Propoact $id)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Propoact supprimé avec succès');
        return $this->redirectToRoute("back");

    }
    /**
     * @Route("/listPropoact", name="listPropoact")
     */
    public function listPropoact()
    {

        $Propoacts= $this->getDoctrine()->getRepository(Propoact::class)->findAll();
        return $this->render("Activite/listPropoact.html.twig",array('Propoact'=>$Propoacts));
    }



    /**
     * @Route("/listactclient", name="listactclient")
     */
    public function listactclient()
    {

        $Propoacts= $this->getDoctrine()->getRepository(Activite::class)->findAll();
        $Propoact= $this->getDoctrine()->getRepository(Therapie::class)->findAll();

        return $this->render("Activite/afficherclientActivite.html.twig",array('actclient'=>$Propoacts,'thclient'=>$Propoact));

    }

    /**
     * @Route("/detailactclient/{id}", name="detailactclient")
     */
    public function detailactclient(Activite $id)
    {
        $s = $this->getDoctrine()->getRepository(Activite::class)->find($id);
        $user=new User();
        $user->setId("12345670");
        $u = $this->getDoctrine()->getRepository(User::class)->find($user);


            $r = $this->getDoctrine()->getRepository(Participationactivte::class)->findOneBy(array('idActivite'=>$s,'idClient'=>$u));

        $Propoacts= $this->getDoctrine()->getRepository(Activite::class)-> findBy(['id'=>$id->getId()]);
        return $this->render("activite/detailactclient.html.twig",array('actclient'=>$Propoacts ,'clientdet'=>$r));

    }

    /**
     * @Route("/approuveract/{id}", name="approuveract")
     */
    public function approuveract(Propoact $id)
    {
        $Propoacts=new Propoact();
        $Propoacts= $this->getDoctrine()->getRepository(Propoact::class)-> find($id);
        $actapprouver=new Activite();

        $actapprouver->setDate( $Propoacts->getDate());
        $actapprouver->setDescription( $Propoacts->getDescription());
        $actapprouver->setDuree( $Propoacts->getDuree());
        $actapprouver->setId( $Propoacts->getId());
        $actapprouver->setIdcoach( $Propoacts->getIdcoach());
        $actapprouver->setNombremax( $Propoacts->getNombremax());
        $actapprouver->setLieu( $Propoacts->getLieu());
        $actapprouver->setType( $Propoacts->getType());

        $em = $this->getDoctrine()->getManager();
            $em->persist($actapprouver);
            $em->flush();
        $em1=$this->getDoctrine()->getManager();
        $em1->remove($id);
        $em1->flush();
        $this->addFlash('success', 'PropoActivite supprimé avec succès');
        return $this->redirectToRoute("back");



    }

    /**
     * @Route("/Like/{idact}/{iduser}", name="Like")
     * @param $idact
     * @param $iduser
     * @param SessionInterface $session
     * @return Response
     */
    public function Like($idact,$iduser,SessionInterface $session) : Response
    {
        $em = $this->getDoctrine()->getManager();
        $Activite = $this->getDoctrine()->getRepository(Activite::class)->find($idact);
        //$u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        $u=new User();
        $u->setId("12341231");
        if ($Activite->isLikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Participationactivte::class)->findOneBy(array('idActivite'=>$Activite,'User'=>$u,'aime'=>'like'));
            $em ->remove($x);
            $em ->flush();
            return $this->json([
                'code'=>200,
                'likes'=>$this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'like']),
                'dislikes'=>$this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'dislike']),
                'idact'=>$idact
            ],200);
        }
        elseif ($Activite->isDisLikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Participationactivte::class)->findOneBy(array('idActivite'=>$Activite,'User'=>$u,'value'=>'dislike'));
            $x->setValue('like');
            $em ->flush();
            return $this->json([
                'code'=>200,
                'likes' => $this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'like']),
                'dislikes'=>$this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'dislike']),
                'idact'=>$idact , 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
            ],200);
        }
        $l = new Participationactivte();
        $l->setValue('like');
        $l->setUser($u);
        $l->setActivite($Activite);
        $em->persist($l);
        $em->flush();
        return $this->json([
            'code' => 200,
            'likes' => $this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'like']),
            'dislikes'=>$this->getDoctrine()->getRepository(Participationactivte::class)->count(['idActivite'=>$Activite,'value'=>'dislike']),
            'idact'=>$idact, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ],200);

    }
    /**
     * @Route("/AjouterNote/{idact}/{iduser}/{v}", name="AjouterNoteSujet")
     */
    public function AjouterNoteSujet($idact,$iduser,$v,SessionInterface $session)
    {
        $s = $this->getDoctrine()->getRepository(Activite::class)->find($idact);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        {
            $em = $this->getDoctrine()->getManager();

            $r = $this->getDoctrine()->getRepository(Participationactivte::class)->findOneBy(array('idActivite'=>$s,'idClient'=>$u));
            $r->setRating($v);
            $em->flush();
            //return $this->json(['moyenne'=>$s->NoteSujetMoyenne(),'note'=>$v],200);
            return $this->redirectToRoute("home");

        }
     /*   else
        {
            $em = $this->getDoctrine()->getManager();
            $note = new Participationactivte();
            $note->setIdClient($u);
            $note->setIdActivite($s);
            $note->setRating($v);
            $em->persist($note);
            $em->flush();
           // return $this->json(['moyenne'=>$s->NoteSujetMoyenne(),'note'=>$v],200);
            return $this->redirectToRoute("home");

        }*/

    }
    /**
     * @Route("/aimerAct/{idact}/{iduser}/{v}", name="aimerAct")
     */
    public function aimerAct($idact,$iduser,$v,SessionInterface $session)
    {
        $s = $this->getDoctrine()->getRepository(Activite::class)->find($idact);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        {
            $em = $this->getDoctrine()->getManager();

            $r = $this->getDoctrine()->getRepository(Participationactivte::class)->findOneBy(array('idActivite'=>$s,'idClient'=>$u));
            $r->setAime($v);
            $em->flush();
            //return $this->json(['moyenne'=>$s->NoteSujetMoyenne(),'note'=>$v],200);
            return $this->redirectToRoute("home");

        }}




}
