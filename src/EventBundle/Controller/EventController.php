<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Event;
use EventBundle\Entity\Categorie;
use EventBundle\Entity\Reservation;
use EventBundle\EventBundle;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


class EventController extends Controller
{
    /**
     * Deletes a event entity.
     *
     * @Route("/all/del/{id}", name="all_delete")
     * @Method("GET")
     */
    public function allDelAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $obj = $em->getRepository('EventBundle:Reservation')->find($id);
        $em->remove($obj);
        $em->flush();
        $serializer = new Serializer([new DateTimeNormalizer('d.m.Y'),new ObjectNormalizer()]);
        $formatted = $serializer->normalize($obj);
        return new JsonResponse($formatted);
    }

    /**
     *
     * @Route("/all/res/user={idU}", name="all_ress")
     * @Method("GET")
     */
    public function allresAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $iduser=$request->get('idU');
        $reservations = $em->getRepository('EventBundle:Reservation')->findByIdU( $em->getRepository(User::class)->find($iduser));
        $serializer = new Serializer([new DateTimeNormalizer('d.m.Y'),new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reservations);
        return new JsonResponse($formatted);
    }

    /**
     *
     * @Route("/all/res/event={idE}&user={idU}", name="all_res")
     * @Method("GET")
     */
    public function emprunterAction(Request $request,$length = 16, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $id = $request->get('idE');
        $iduser=$request->get('idU');
        //$token = $request->get('idUser');
        $entitymanager = $this->getDoctrine()->getManager();
        $event = $entitymanager->getRepository(Event::class)->find($id);
        $user = $entitymanager->getRepository(User::class)->find($iduser);
        $name = $event->getNom();
        $entitymanager = $this->getDoctrine()->getManager();
        $em=$this->getDoctrine()->getManager();
        $x=$em->getRepository('EventBundle:Reservation')->findOneBy(array('idE'=>$event,'idU'=>$user));

        $com= new Reservation();
        $com->setIdE($event);
        $com->setIdU($user);
        if ($x==null) {
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $qrCode = new QrCode($randomString);
            $qrCode->setSize(300);
            header('Content-Type: '.$qrCode->getContentType());
            $qrCode->writeFile(__DIR__. '/../../../web/images/'.$user.$name.'.png');
            $com->setQrcode($randomString);
            $entitymanager->persist($com);
            $entitymanager->flush();
        }
        $serializer = new Serializer([new DateTimeNormalizer('d.m.Y'), new ObjectNormalizer()]);
        $formatted = $serializer->normalize($com);
        return new JsonResponse($formatted);
    }

    /**
     *
     * @Route("/all/cat", name="all_cat")
     * @Method("GET")
     */
    public function allCatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $documents = $em->getRepository('EventBundle:Categorie')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($documents);
        return new JsonResponse($formatted);
    }

    /**
     *
     * @Route("/all", name="all")
     * @Method("GET")
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();
        $documents = $em->getRepository('EventBundle:Event')->findAll();
        $serializer = new Serializer([new DateTimeNormalizer('d.m.Y'),new ObjectNormalizer()]);
        $formatted = $serializer->normalize($documents);
        return new JsonResponse($formatted);
    }


    /**
     * Deletes a event entity.
     *
     * @Route("/liste/res/{id}/delete", name="res_delete")
     * @Method("DELETE")
     */
    public function deleteResAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $obj = $em->getRepository('EventBundle:Reservation')->find($id);
        $em->remove($obj);
        $em->flush();
        $em1 = $this->getDoctrine()->getManager();
        $idx = $this->container->get('security.token_storage')->getToken()->getUser();
        $reservations = $em1->getRepository('EventBundle:Reservation')->findByIdU( $em->getRepository(User::class)->find($idx));
        $em2=$this->getDoctrine()->getManager();
        $membres = $em1->getRepository('ClubBundle:Membre')->findByUser( $em->getRepository(User::class)->find($idx));
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();
        $user = $this->getUser();

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }


        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
            'categories'=>$categories,
            'reservations' => $reservations,
            'membres' => $membres,
        ));
    }

    /**
     * Lists all event entities.
     *
     * @Route("/event/res", name="event_rese")
     * @Method("GET")
     */
    public function resAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('EventBundle:Reservation')->findAll();

        return $this->render('event/res.html.twig', array(
            'reservations' => $reservations,

        ));
    }


    /**
     *
     * @Route("/liste/res/{id}", name="event_res")
     * @Method("GET")
     */
    public function reservationAction(Request $request,Event $event,$length = 16, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $reservation = new Reservation();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $user->getId();
        $routeParams = $request->attributes->get('_route_params');
        $event->getId();
        $name = $event->getNom();
        $reservation->setIdU($user);
        $reservation->setIdE($event);
        $em5=$this->getDoctrine()->getManager();
        $x=$em5->getRepository('EventBundle:Reservation')->findOneBy(array('idE'=>$event,'idU'=>$user));
        if ($x==null){
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $qrCode = new QrCode($randomString);
            $qrCode->setSize(300);
            header('Content-Type: '.$qrCode->getContentType());
            $qrCode->writeFile(__DIR__. '/../../../web/images/'.$user.$name.'.png');
            $reservation->setQrcode($randomString);
            $em1 = $this->getDoctrine()->getManager();
            $em1->persist($reservation);
            $em1->flush();
            $this->addFlash('success', 'MERCIII pour votre participation !');

        }
        else
        {
            $this->addFlash('success', 'Vous êtes déjà inscrit à cette événement');
        }
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();

        return $this->render('event/details.html.twig', array(
            'event' => $event,
            'categories'=>$categories,
        ));
    }


    /**
     *
     * @Route("/cat/{id}", name="event_cat")
     * @Method("GET")
     */
    public function categoriesAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();
        $events = $em->getRepository('EventBundle:Event')->findByCat( $em->getRepository(Categorie::class)->find($id));

        return $this->render('event/liste.html.twig', array(
            'events' => $events,
            'categories'=>$categories,
        ));
    }


    /**
     *
     * @Route("/l", name="event_liste")
     * @Method("GET")
     */
    public function listeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();
        $events = $em->getRepository('EventBundle:Event')->findAll();

        return $this->render('event/liste.html.twig', array(
            'events' => $events,
            'categories'=>$categories,
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/l/{id}", name="event_details")
     * @Method("GET")
     */
    public function detailsAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $em2=$this->getDoctrine()->getManager();
        $categories=$em2->getRepository('EventBundle:Categorie')->findAll();

        return $this->render('event/details.html.twig', array(
            'event' => $event,
            'categories'=>$categories,

        ));
    }

    /**
     * Lists all event entities.
     *
     * @Route("/baskel", name="baskel_index")
     * @Method("GET")
     */
    public function defaultAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories=$em->getRepository('EventBundle:Categorie')->findAll();
        $events = $em->getRepository('EventBundle:Event')->findAll();

        return $this->render('event/default.html.twig', array(
            'events' => $events,
            'categories' => $categories,
        ));
    }


    /**
     * Lists all event entities.
     *
     * @Route("/event/liste", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('EventBundle:Event')->findAll();

        return $this->render('event/index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * Creates a new event entity.
     *
     * @Route("/event/new", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm('EventBundle\Form\EventType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event->UploadProfilePicture();
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('event/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/event/{id}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/event/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event)
    {

        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('EventBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $event->UploadProfilePicture();
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
        }

        return $this->render('event/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     * @Route("/event/{id}/delete", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Event $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}
