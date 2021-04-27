<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaire;
use App\Entity\User;

use App\Services\GetUser;
use Doctrine\DBAL\Types\TextType;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Form\CommentaireType;



use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use App\Repository\CommentaireRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Import the PDF Parser class
 */
use Smalot\PdfParser\Parser;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

$filesystem = new Filesystem();

try {
    $filesystem->mkdir(sys_get_temp_dir().'/'.random_int(0, 1000));
} catch (IOExceptionInterface $exception) {
    echo "An error occurred while creating your directory at ".$exception->getPath();
}

class HomeController extends AbstractController
{
    /**
     * @Route("/home1", name="home1")
     */
    public function index(): Response
    {
        return $this->render('article/article.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

       

    /**
     * @Route("/ajouterarticle", name="ajouterarticle")
     */
    public function ajouterarticle(Request $request,GetUser $userr)

    {

        $article = new Article();
        $article->setIdUser($userr->Get_User());
        $article->setDate("27/04/2021");
        $form = $this->createForm(ArticleType::class, $article);


        $form->add("ajouter", SubmitType::class);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file =$article->getArticle();
            $filename= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$filename);
            $article->setArticle($filename);
            $em->persist($article);
            $em->flush();
            return
                $this->redirectToRoute("listArticle1");
        }
        return $this->render("article/home.html.twig",['format' => $form->createView()] );


    }

    /**
     * @Route("/modifierArticle/{id}", name="modifierArticle")
     */
    public function modifierArticle(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $this->getDoctrine()->getRepository(Article::class)->findAll();

        $res = $em->getRepository(Article::class)->find($id);
        $form = $this->createForm(ArticleType::class, $res);
        $form->add("update", SubmitType::class
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file =$Article->getArticle();
            $filename= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$filename);
            $Article->setArticle($filename);
            $em->flush();
            $this->addFlash('success', 'Article modifié avec succès');
            return $this->redirectToRoute('listArticle1');
        }
        return $this->render('article/modifierArticle.html.twig', [
            'format' => $form->createView()
        ]);
    }



    /**
     * @Route("/modifierArticleback/{id}", name="modifierArticleback")
     */
    public function modifierArticleback(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $this->getDoctrine()->getRepository(Article::class)->findAll();

        $res = $em->getRepository(Article::class)->find($id);
        $form = $this->createForm(ArticleType::class, $res);
        $form->add("update", SubmitType::class
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file =$Article->getArticle();
            $filename= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$filename);
            $Article->setArticle($filename);
            $em->flush();
            $this->addFlash('success', 'Article modifié avec succès');
            return $this->redirectToRoute('listArticle');
        }
        return $this->render('article/modifierArticleback.html.twig', [
            'format' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimerArticle/{id}", name="supprimerArticle" )
     * @Method("DELETE")
     */
    public function supprimerArticle(Article $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute("listArticle");

    }
    /**
     * @Route("/supprimerfront/{id}", name="supprimerfront" )
     * @Method("DELETE")
     */
    public function supprimerfront(Article $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return $this->redirectToRoute("listArticle1");

    }

    /**
     * @Route("/approuver1/{id}", name="approuver1" )
     *
     */
    public function approuver1(Article $id)
    {   $em = $this->getDoctrine()->getManager();
        $filesystem = new Filesystem();
        $Article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $res = $em->getRepository(Article::class)->find($id);
        $res->setApprouver(1);
        $filesystem->copy('../public/uploads/'.$res->getArticle(), '../public/uploads1/'.$res->getArticle());

        $em->flush();
        $this->addFlash('success', 'Article ');
        return $this->redirectToRoute("listArticle");
    }
    /**
     * @Route("/listArticle1", name="listArticle")
     */
    public function listArticleapp()
    {

        $Articles = $this->getDoctrine()->getRepository(Article::class)->findBy(array('approuver'=> 1));
        return $this->render("article/listArticle.html.twig", array('Article' => $Articles));


    }





    /**
     * @Route("/listArticle", name="listArticle")
     */
    public function listArticle()
    {

        $Articles = $this->getDoctrine()->getRepository(Article::class)->findBy(array('approuver'=> 0));
        return $this->render("article/listArticle.html.twig", array('Article' => $Articles));
    }
    /**
     * @Route("/listecommentaire", name="listecommentaire")
     */
    public function listecommentaire()
    {

        $Articles = $this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render("article/listecommentaire.html.twig", array('Commentaire' => $Articles));
    }

//listearticle1 by id

    /**
     *  @Route("/listArticle1", name="listArticle1")
     */
    public function listArticle1(Request $request, PaginatorInterface $pagination,GetUser $userr)
    {
        $Articleapp = $this->getDoctrine()->getRepository(Article::class)->findBy(array('approuver'=> 1));
        $art1= $pagination->paginate($Articleapp,$request->query->getInt('page',1),4);
        $u = $this->getDoctrine()->getRepository(User::class)->find($userr->Get_User());
        $Articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['idUser'=>$u]);

        $art2= $pagination->paginate($Articles,$request->query->getInt('page',1),4);
        return $this->render("article/listArticle1.html.twig", ['Article' => $art2, 'Articleapp' => $art1]);
    }


    /**
     * @Route("/listarticles1", name="showarticlesTN")
     */

    public function listTriearticleN(ArticleRepository $repository)
    {
        $Articles = $this->getDoctrine()->getRepository(Article::class)->listOrderByName();
        return $this->render("article/listArticle1.html.twig", array('Article' => $Articles));

    }
    /**
     * @Route("/listeArticlesTC", name="showarticlesTC")
     */

    public function listTriearticleC(ArticleRepository $repository)
    {
        $Articles = $this->getDoctrine()->getRepository(Article::class)->listOrderByCategories();
        return $this->render("article/listArticle1.html.twig", array('Article' => $Articles));

    }

    /**
     * @Route ("/rechercheart",name="rechercheart")
     */
    public function rechercher(ArticleRepository $repository , Request $request)
    {
        $data=$request->get('search');
        $article=$repository->SearchName($data);
        return $this->render('article/listArticle1.html.twig',array('Article'=>$article));
    }





    /**
     * @Route ("/articledetail/{id}",name="articledetail")
     */
    public function detailarticle(Article $id,Request $request,GetUser $userr,)

    {   $Commentaire1= new Commentaire();
        $Commentaire1->setDate("27/04/2021");
        $Commentaire1->setIdUser($userr->Get_User());

        $Articledetail = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $Commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->findBy(['idArticle'=>$id->getId()]);
        $Commentaire1->setIdArticle($Articledetail);
        $Commentaire2=$this->getDoctrine()->getRepository(Commentaire::class)->findBy(['idArticle'=>$id->getId(),'idUser'=>$userr->Get_User()]);
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile('../public/uploads1/' . $Articledetail->getArticle());
        $text = $pdf->getText();

        $form = $this->createForm(CommentaireType::class, $Commentaire1);
        $form->add("add", SubmitType::class);
        $em = $this->getDoctrine()->getManager();
        $a=$Commentaire1->getIdArticle();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($Commentaire1);
            $em->flush();

            return $this->redirectToRoute('articledetail',['id' => $a->getId()]);
        }

        return $this->render("article/article.html.twig", [ 'Commentaire' => $Commentaire,'com'=>$Commentaire2,'Article' => $text, 'format' => $form->createView()]);
    }
    /**
     * @Route("/modifierCOM/{id}", name="modifierCOM")
     */
    public function modifiercom(Request $request, Commentaire $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Commentaire = $this->getDoctrine()->getRepository(Article::class)->findAll();

        $res = $em->getRepository(Commentaire::class)->find($id);
        $form = $this->createForm(CommentaireType::class, $res);
        $form->add("update", SubmitType::class
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $em->flush();
            $this->addFlash('success', 'Article modifié avec succès');
            return $this->redirectToRoute('back');
        }
        return $this->render('article/article.html.twig', [
            'format' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimercomm/{id}", name="supprimercomm" )
     * @Method("DELETE")
     */
    public function supprimercom(Commentaire $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Article supprimé avec succès');
        return $this->redirectToRoute("listecommentaire");

    }
    /**
     * @Route("/supprimercommfront/{id}", name="supprimercommfront" )
     * @Method("DELETE")
     */
    public function supprimercomfront(Commentaire $id)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($id);
        $em->flush();
        $this->addFlash('success', 'Article supprimé avec succès');
        return $this->redirectToRoute("articledetail",['id' => $id->getIdArticle()->getId()]);

    }

    /**
     * @Route ("/rechercheartback",name="rechercheartback")
     */
    public function rechercherback(ArticleRepository $repository , Request $request)
    {
        $data=$request->get('search');
        $article=$repository->SearchName($data);
        return $this->render('article/listArticle.html.twig',array('Article'=>$article));
    }
    /**
     * @Route ("/rechercheCOM",name="rechercheCOM")
     */
    public function rechercherCOM(CommentaireRepository $repository , Request $request)
    {
        $data=$request->get('search');
        $article=$repository->Search($data);
        return $this->render('article/listecommentaire.html.twig',array('Commentaire'=>$article));
    }


}
