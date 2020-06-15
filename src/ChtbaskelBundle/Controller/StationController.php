<?php

namespace ChtbaskelBundle\Controller;

use ChtbaskelBundle\Entity\Location;
use ChtbaskelBundle\Entity\Station;
use EventBundle\Entity\Categorie;
use ChtbaskelBundle\Form\StationType;
use Ivory\GoogleMap\Overlay\Marker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Overlay\Icon;
use Ivory\GoogleMap\Base\Point;
use Ivory\GoogleMap\Overlay\InfoWindow;
use Ivory\GoogleMap\Overlay\InfoWindowType;
use Ivory\GoogleMap\Overlay\MarkerClusterType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;




class StationController extends Controller
{
    public function findAction($id)
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository(User::class)
            ->findOneBy(['username' => $id]);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    public function ajoutStationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $station = new Station();
        $form = $this->createForm(StationType::class, $station, array(
            'method' => 'POST',
        ));
        $form ->add('Ajouter Station', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($station);
            $em->flush();
        }
        //recherche
        $em = $this->getDoctrine()->getManager();
        $motcle = $request->get('motcle');
        $repository =$em->getRepository('ChtbaskelBundle:Station');
        $query = $repository->createQueryBuilder('station')
            ->where('station.nomStation like :name or station.longitude like :name or station.latitude like :name')
            ->setParameter('name', '%'.$motcle.'%')
            ->orderBy('station.nomStation', 'ASC')
            ->getQuery();
        $list = $query->getResult();
        $listpagine  = $this->get('knp_paginator')->paginate(
            $list,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            6/*nbre d'éléments par page*/);
        //recherche
        return $this->render("@Chtbaskel/Station/ajoutS.html.twig",array(
            'form'=>$form->createView(),
            'stations' => $listpagine
            ));
    }

    public function supprimerStationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('ChtbaskelBundle:Station')->find($id);
        $em->remove($station);
        $em->flush();
        return $this->redirectToRoute('chtbaskel_ajoutStation');
    }

    public function modifierStationAction($id)
    {
        //get ID
        $em = $this->getDoctrine()->getManager();
        $s = $em->getRepository('ChtbaskelBundle:Station')->find($id);

        if (!$s) {
            throw $this->createNotFoundException('Unable to find personne entity.');
        }
        $editform = $this->createEditForm($s);

        return $this->render('@Chtbaskel/Station/modifierS.html.twig', array(
            's'      => $s,
            'edit_form' => $editform->createView()));
    }
    private function createEditForm(station $s)
    {
        //create  a form
        $editform = $this->createForm(StationType::class, $s, array(
            'action' => $this->generateUrl('chtbaskel_update', array('id' => $s->getId())),
            'method' => 'PUT',
        ));
        $editform->add('Modifier Station', SubmitType::class);
        return $editform;
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $s = $em->getRepository('ChtbaskelBundle:Station')->find($id);

        $editForm = $this->createEditForm($s);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('chtbaskel_ajoutStation'));
        }

        return $this->render('Chtbaskel/Station/modifierS.html.twig', array(
            's'      => $s,
            'edit_form'   => $editForm->createView(),

        ));
    }

    public function afficherMapStationAction($id)
    {
        //get ID
        $em = $this->getDoctrine()->getManager();
        $s = $em->getRepository('ChtbaskelBundle:Station')->find($id);

        $map = $this->afficherMap($s);

        return $this->render('@Chtbaskel/Station/AfficherMS.html.twig', array(
            'map'      => $map,
            ));

    }

    private function afficherMap($s)
    {
        $map = new Map();
        $latitude = $s -> getLatitude();
        $longitude = $s -> getLongitude();
        // Disable the auto zoom flag (disabled by default)
        $map->setAutoZoom(false);
        // Sets the center
        $map->setCenter(new Coordinate($latitude, $longitude));
        // Sets the zoom
        $map->setMapOption('zoom', 15);
        $map->setStylesheetOption('width', '400px');
        $map->setStylesheetOption('height', '400px');
        $map->setMapOption('mapTypeId', 'roadmap');
        $map->setHtmlId('map-container-google-18');
        $position = new Coordinate($latitude, $longitude, true);
        $marker = new Marker($position, 'drop', null, null, null);
        $marker->setIcon(new Icon('http://maps.google.com/mapfiles/ms/icons/cycling.png', new Point()));
        $content = $this->render('@Chtbaskel/Station/InfoWinShow.html.twig', array('s' => $s))->getContent();
        $infoWindow = new InfoWindow($content, InfoWindowType::DEFAULT_, $position);
        $marker->setInfoWindow($infoWindow);
        $map->getOverlayManager()->addMarker($marker);

        return $map;
    }

    public function afficherMapFrontAction()
    {
        $map = new Map();
        // Disable the auto zoom flag (disabled by default)
        $map->setAutoZoom(false);
        // Sets the center
        $map->setCenter(new Coordinate(36.85908,10.15969 ));
        // Sets the zoom
        $map->setMapOption('zoom', 10);
        $map->setStylesheetOption('width', '1349px');
        $map->setStylesheetOption('height', '550px');
        $map->setMapOption('mapTypeId', 'roadmap');
        $map->setHtmlId('map-container-google-18');

        $em = $this->getDoctrine()->getManager();
        $stations = $em->getRepository('ChtbaskelBundle:Station')->findAll();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();
        foreach ($stations as $s)
        {
            $position = new Coordinate($s->getLatitude(), $s->getLongitude(), true);
            $marker=$this->updateMarker($s,$position);
            $content = $this->render('@Chtbaskel/Station/InfoWinShow.html.twig', array('s' => $s))->getContent();
            $infoWindow = new InfoWindow($content, InfoWindowType::DEFAULT_, $position);
            $marker->setInfoWindow($infoWindow);
            $map->getOverlayManager()->addMarker($marker);
        }
        $map->getOverlayManager()->getMarkerCluster()->setType(MarkerClusterType::MARKER_CLUSTERER);
        return $this->render('@Chtbaskel/Station/AfficherMapFront.html.twig', array(
            'map'      => $map,
            'categories'      => $categories,
        ));
    }

    public function rechercherStationAction(Request $request)
    {
        $search = $request->get('search');

        $em = $this->getDoctrine()->getManager();
        $repository =$em->getRepository('ChtbaskelBundle:Station');
        $query = $repository->createQueryBuilder('station')
            ->where('station.nomStation like :name ')
            ->setParameter('name', '%'.$search.'%')
            ->orderBy('station.nomStation', 'ASC')
            ->getQuery();
        $result = $query->getResult();
        if(!$result)
        {
            return $this->redirect($this->generateUrl('chtbaskel_afficherMapFront'));
        }
        $latitude=$result[0]->getLatitude();
        $longitude=$result[0]->getLongitude();

        $map = new Map();
        // Disable the auto zoom flag (disabled by default)
        $map->setAutoZoom(false);
        // Sets the center
        $map->setCenter(new Coordinate($latitude,$longitude ));
        // Sets the zoom
        $map->setMapOption('zoom', 10);
        $map->setStylesheetOption('width', '1349px');
        $map->setStylesheetOption('height', '550px');
        $map->setMapOption('mapTypeId', 'roadmap');
        $map->setHtmlId('map-container-google-18');
        $position = new Coordinate($latitude, $longitude, true);
        $marker = new Marker($position, 'drop', null, null, null);
        $marker->setIcon(new Icon('http://maps.google.com/mapfiles/ms/icons/cycling.png', new Point()));
        $content = $this->render('@Chtbaskel/Station/InfoWinShow.html.twig', array('s' => $result[0]))->getContent();
        $infoWindow = new InfoWindow($content, InfoWindowType::DEFAULT_, $position);
        $marker->setInfoWindow($infoWindow);
        $map->getOverlayManager()->addMarker($marker);
        return $this->render('@Chtbaskel/Station/AfficherMapFront.html.twig', array(
            'map'      => $map,
        ));
    }

    public function louerVeloAction(Request $request, Station $station)
    {
        $location = new Location();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $user->getId();
        $station->getId();
        $location->setIdstation($station);
        $location->setIduser($user);
        $em=$this->getDoctrine()->getManager();
        $x=$em->getRepository('ChtbaskelBundle:Location')->findOneBy(array('idstation'=>$station,'iduser'=>$user));
        if (!$x)
        {
            $em1=$this->getDoctrine()->getManager();
            $em1->persist($location);
            $nbV= $station->getNbrVelo();
            $station->setNbrVelo($nbV-1);
            $em1->flush();
            $this->addFlash('success','Vélo loué!');

            //EMAILING
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('mariemchtourou98@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'registration.html.twig',
                        ['name' => $user->getusername()]
                    ),
                    'text/html'
                )

            ;

            $this->get('mailer')->send($message);
            //EMAILING
        }
        else
        {
            $this->addFlash('success','Vous avez déjà loué ce vélo.');
        }

        //initialiser map ENCORE
        $map = new Map();
        // Disable the auto zoom flag (disabled by default)
        $map->setAutoZoom(false);
        // Sets the center
        $map->setCenter(new Coordinate(36.85908,10.15969 ));
        // Sets the zoom
        $map->setMapOption('zoom', 10);
        $map->setStylesheetOption('width', '1349px');
        $map->setStylesheetOption('height', '550px');
        $map->setMapOption('mapTypeId', 'roadmap');
        $map->setHtmlId('map-container-google-18');

        $em = $this->getDoctrine()->getManager();
        $stations = $em->getRepository('ChtbaskelBundle:Station')->findAll();

        foreach ($stations as $s)
        {
            $position = new Coordinate($s->getLatitude(), $s->getLongitude(), true);
            $marker=$this->updateMarker($s,$position);
            $content = $this->render('@Chtbaskel/Station/InfoWinShow.html.twig', array('s' => $s))->getContent();
            $infoWindow = new InfoWindow($content, InfoWindowType::DEFAULT_, $position);
            $marker->setInfoWindow($infoWindow);
            $map->getOverlayManager()->addMarker($marker);
        }
        $map->getOverlayManager()->getMarkerCluster()->setType(MarkerClusterType::MARKER_CLUSTERER);
        return $this->render('@Chtbaskel/Station/AfficherMapFront.html.twig', array(
            'map'      => $map,
        ));
    }
    public function updateMarker($station,$position)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if( $this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED') ){
            $user->getId();
            $station->getId();
            $em = $this->getDoctrine()->getManager();
            $x = $em->getRepository('ChtbaskelBundle:Location')->findOneBy(array('idstation' => $station, 'iduser' => $user));
            if (!$x) {
                $marker = new Marker($position, 'drop', null, null, null);
                $marker->setIcon(new Icon('http://maps.google.com/mapfiles/ms/icons/cycling.png', new Point()));
            } else {
                $marker = new Marker($position, 'drop', null, null, null);
                $marker->setIcon(new Icon('http://maps.google.com/mapfiles/ms/icons/grn-pushpin.png', new Point()));
            }
        }
        else {
            $marker = new Marker($position, 'drop', null, null, null);
            $marker->setIcon(new Icon('http://maps.google.com/mapfiles/ms/icons/cycling.png', new Point()));
        }
        return $marker;
    }
}
