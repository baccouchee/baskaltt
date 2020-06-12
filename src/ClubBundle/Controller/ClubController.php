<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\Membre;
use Endroid\QrCode\QrCode;
use EventBundle\Entity\Event;
use EventBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;
use GestionProduitBundle\Entity\Rating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\BrowserKit\Response;
/**
 * Club controller.
 *
 * @Route("club")
 */
class ClubController extends Controller
{
    /**
     *
     * @Route("/liste/mem/{id}", name="club_ins")
     * @Method("GET")
     */
    public function inscriptionAction(Request $request,Club $club)
    {
        $membre = new Membre();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $user->getId();
        $routeParams = $request->attributes->get('_route_params');
        $club->getId();
        $name = $club->getNomclub();
        $membre->setUser($user);
        $membre->setClub($club);
        $em5=$this->getDoctrine()->getManager();
        $x=$em5->getRepository('ClubBundle:Membre')->findOneBy(array('club'=>$club,'user'=>$user));
        if ($x==null){
            $em1 = $this->getDoctrine()->getManager();
            $em1->persist($membre);
            $em1->flush();
            $this->addFlash('success', 'MERCIII pour votre inscription !');

        }
        else
        {
            $this->addFlash('success', 'Vous êtes déjà inscrit à ce club');
        }
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();

        return $this->render('club/details.html.twig', array(
            'club' => $club,
            'categories'=>$categories,
        ));
    }


    /**
     * Lists all club entities.
     *
     * @Route("/valider/{id}", name="club_valider")
     * @Method("GET")
     */
    public function validerAction(Club $club)
    {

        $club->setEtat('valider');
        $em = $this->getDoctrine()->getManager();
        $clubs = $em->getRepository('ClubBundle:Club')->findAll();

        $em->persist($club);
        $em->flush();


        return $this->render('club/index.html.twig', array(
            'clubs' => $clubs,
        ));
    }

    /**
     *
     * @Route("/stat", name="club_stat")
     *
     */
    public function chartAction()
    {
        // Chart
        $series = array(
            array("name" => "Data Serie Name",    "data" => array(1,2,4,5,6,3,8))
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Qualite des club');
        $ob->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob->yAxis->title(array('text'  => "Vertical axis title"));
        $ob->series($series);

        return $this->render('club/stat.html.twig', array(
            'chart' => $ob
        ));
    }
    /**
     * Lists all club entities.
     *
     * @Route("/", name="club_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clubs = $em->getRepository('ClubBundle:Club')->findAll();

        return $this->render('club/index.html.twig', array(
            'clubs' => $clubs,
        ));
    }
    /**
     *
     * @Route("/liste", name="club_liste")
     * @Method("GET")
     */
    public function listeAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $em2=$this->getDoctrine()->getManager();
        $clubs1 = $em2->getRepository('ClubBundle:Club')->findAll();
        $clubs = $em->getRepository('ClubBundle:Club')->findBy(array('etat'=>'valider'));
        $categories=$em->getRepository('EventBundle:Categorie')->findAll();
        $events = $em->getRepository('EventBundle:Event')->findAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result = $paginator->paginate(
            $clubs,
            $request->query->getInt('page',2),
            $request->query->getInt('limit',1)
        );
        return $this->render('club/liste.html.twig', array(
            'clubs' => $result,
            'events' => $events,
            'categories' => $categories,

        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/liste/{id}", name="club_details")
     * @Method("GET")
     */
    public function detailsAction(Club $club,Request $request)
    {
        $form = $this->createForm('ClubBundle\Form\RType', $club);
        $form->handleRequest($request);
        $deleteForm = $this->createDeleteForm($club);
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();
        $events = $em2->getRepository('EventBundle:Event')->findAll();

        return $this->render('club/details.html.twig', array(
            'club' => $club,
            'events' => $events,
            'categories' => $categories,
            'form' => $form->createView(),

        ));
    }


    /**
     * Creates a new club entity.
     *
     * @Route("/new", name="club_new")
     * @Method({"GET", "POST"})
     */

    public function newAction(Request $request)
    {
        $club = new Club();
        $form = $this->createForm('ClubBundle\Form\ClubType', $club);
        $form->handleRequest($request);
        $em2 = $this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();
        $events = $em2->getRepository('EventBundle:Event')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $club->UploadProfilePicture();
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('club_liste', array('id' => $club->getId()));
        }

        return $this->render('club/new.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
            'events' => $events,
            'categories' => $categories,
        ));
    }

    /**
     * Finds and displays a club entity.
     *
     * @Route("/{id}", name="club_show")
     * @Method("GET")
     */
    public function showAction(Club $club)
    {
        $deleteForm = $this->createDeleteForm($club);

        return $this->render('club/show.html.twig', array(
            'club' => $club,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing club entity.
     *
     * @Route("/{id}/edit", name="club_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Club $club)
    {
        $deleteForm = $this->createDeleteForm($club);
        $editForm = $this->createForm('ClubBundle\Form\ClubType', $club);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $club->UploadProfilePicture();
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_edit', array('id' => $club->getId()));
        }

        return $this->render('club/edit.html.twig', array(
            'club' => $club,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing club entity.
     *
     * @Route("/{id}", name="club_valid")
     * @Method({"GET", "POST"})

    public function validAction (Request $request, Club $club)
    {
        $validForm = $this->createForm('ClubBundle\Form\ClubType', $club);
        $validForm->handleRequest($request);



        if ($validForm->isSubmitted() && $validForm->isValid()) {
            $club->setEtat('valider');
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_edits', array('id' => $club->getId()));
        }

        return $this->render('club/show.html.twig', array(
            'club' => $club,
            'valid_form' => $validForm->createView(),

        ));
    }
     */
    /**
     * Deletes a club entity.
     *
     * @Route("/{id}/delete", name="club_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Club $club)
    {
        $form = $this->createDeleteForm($club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club);
            $em->flush();
        }

        return $this->redirectToRoute('club_index');
    }

    /**
     * Creates a form to delete a club entity.
     *
     * @param Club $club The club entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Club $club)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('club_delete', array('id' => $club->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }




    /**
     *
     *
     * @Route("/{id}/{note}", name="club_noter")
     *
     */
    function noterAction($id,$note){
        $user=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Produit::class)->find($id);
        $rating=$em->getRepository(RatingProduit::class)->findOneBy(array('user'=>$user, 'club'=>$club));
        if ($rating==null){
            $rating=new Rating();
            $rating->setNote($note);
            $rating->setUser($user);
            $rating->setClub($club);
            $em->persist($rating);
        }else
            $rating->setNote($note);
        $em->flush();
        return new Response($note);
    }
}
