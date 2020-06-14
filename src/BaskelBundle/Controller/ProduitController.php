<?php

namespace BaskelBundle\Controller;

use BaskelBundle\Entity\CategorieP;
use BaskelBundle\Entity\Likes;
use BaskelBundle\Entity\Produit;
use BaskelBundle\Form\ProduitType;
use BaskelBundle\Form\CategoriePType;
use app\Form\SearchForm;
use app\Form\SearchData;
use Doctrine\ORM\Query\QueryException;
use Slim\App;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Dompdf\Dompdf;
use Dompdf\Options;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Map;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\TreeMapChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Events;
use CMEN\GoogleChartsBundle\GoogleCharts\EventType;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\BarChart\BarChartOptions;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Histogram;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Slim\Flash\Messages;
use EventBundle\Entity\Categorie;


class ProduitController extends Controller
{
    /**
     * @Route("/produit/nev",name="nev_produit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajoutProduitAction(Request $request)
    {// $em = $this->getDoctrine()->getManager();
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /**
             * @var UploadedFile $file
             */
            $file = $produit->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $produit->setImage($fileName);
            $em->persist($produit);
            $em->flush();
            $this->addFlash('info', 'Added Successfully !');

            //return $this->redirectToRoute('baskel_afficheProduit');

            return $this->redirectToRoute('baskel_afficheProduitBack');
        }


        return $this->render('@Baskel/Produit/ajoutP.html.twig', array('form' => $form->createView()));

    }

    public function afficheProduitAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->findAll();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $produit,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 4)
        );


//...

        return $this->render('@Baskel/Produit/afficheP.html.twig', array(
            'produit' => $result, 'categoriep' => $categoriep,'categories' => $categories
        ));
    }

    public function afficheProduitBackAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->findAll();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $produit,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );

        $pieChart = new PieChart();
        $totalHousings=0;
        foreach($produit as $hs ){
            $totalHousings=$totalHousings+$hs->getQuantite();
        }
        $data=array();
        $stat=['produit','quantite'];
        $nb=0;
        array_push($data,$stat);
        foreach($produit as $produit){
            $stat=array();
            array_push($stat,$produit->getNom(),(($produit->getQuantite())*100)/$totalHousings);
            $nb=($produit->getQuantite()*100)/$totalHousings;
            $stat=[$produit->getNom(),$nb];
            array_push($data,$stat);
        }


        $pieChart->getData()->setArrayToDataTable( $data );
        $pieChart->getOptions()->setTitle('La quantité des produits ');
        $pieChart->getOptions()->setHeight(500); $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#111111');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(false);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('latto');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(15);

        return $this->render('@Baskel/Produit/affichePBack.html.twig', array(
            'produit' => $result,'pieChart' => $pieChart));
    }
    public function afficheDetailAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->find($id);
        $like = $em->getRepository('BaskelBundle:Likes')->findAll();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();



        return $this->render('@Baskel/Produit/afficheDetail.html.twig', array(
        'produit' => $produit,'like' => $like, 'categories' => $categories));
    }
    public function afficheDetailLAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->find($id);
        $like = $em->getRepository('BaskelBundle:Likes')->findAll();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();



        return $this->render('@Baskel/Produit/afficheDetailL.html.twig', array(
            'produit' => $produit,'like' => $like, 'categories' => $categories ));
    }

    public function afficheCategorieAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $categoriep,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );
        return $this->render('@Baskel/CategorieP/afficheC.html.twig', array(
            'categoriep' => $result));
    }

    public function suppCategorieAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->find($id);
        try {
            $em->remove($categoriep);
            $em->flush();
            $this->addFlash('infooo', 'Deleted Successfully !');

            return $this->redirectToRoute('baskel_afficheCategorie');
        }catch (\Exception $e) {
            $this->addFlash('warning', 'deleted Unsuccessfully! this category is being used');
            return $this->redirectToRoute('baskel_afficheCategorie');


        }


    }


    public function suppProduitAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->find($id);
        $image = $produit->getImage();
        $path = $this->getParameter('images_directory') . '/' . $image;
        $fs = new Filesystem();
        $fs->remove(array($path));
        $em->remove($produit);
        $em->flush();
        $this->addFlash('infooo', 'Deleted Successfully !');

        return $this->redirectToRoute('baskel_afficheProduitBack');
    }

    public function ajoutCategorieAction(Request $request)
    {


        $categoriep = new CategorieP();
        $form = $this->createForm(CategoriePType::class, $categoriep);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('info', 'added Successfully!');
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriep);
            $em->flush();
            return $this->redirectToRoute('baskel_afficheCategorie');
        }


        return $this->render('@Baskel/CategorieP/ajoutC.html.twig', array('form' => $form->createView()));
    }

    public function modifierProduitAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->find($id);
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
            $file = $produit->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('images_directory'), $fileName);
            $produit->setImage($fileName);
            $em->persist($produit);
            $em->flush();
            $this->addFlash('infoo', 'updated Successfully !');
            return $this->redirectToRoute('baskel_afficheProduitBack');
        }


        return $this->render('@Baskel/Produit/modifierP.html.twig', array(
            'form' => $form->createView()));


    }

    public function modifierCategorieAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('BaskelBundle:CategorieP')->find($id);
        $form = $this->createForm(CategoriePType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            $this->addFlash('infoo', 'updated Successfully !');
            return $this->redirectToRoute('baskel_afficheCategorie');
        }


        return $this->render('@Baskel/CategorieP/ajoutC.html.twig', array(
            'form' => $form->createView()));


    }

    public function rechercheerAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $motcle = $request->get('motcle');

        $repository =$em->getRepository('BaskelBundle:CategorieP');
        $query = $repository->createQueryBuilder('d')
            ->where('d.name like :name')
            ->setParameter('name', '%'.$motcle.'%')
            ->orderBy('d.name', 'ASC')
            ->getQuery();

        $list = $query->getResult();
        $paginator = $this ->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );

        return $this->render('@Baskel/CategorieP/afficheC.html.twig',array(
            'categoriep'=>$pagination,

        ));

    }
    public function rechercheerpAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $motcle = $request->get('motcle');

        $repository =$em->getRepository('BaskelBundle:Produit');
        $query = $repository->createQueryBuilder('produit')
            ->where('produit.nom like :name or produit.quantite like :name or produit.reference like :name or produit.prix like :name or produit.description like :name')
            ->setParameter('name', '%'.$motcle.'%')
            ->orderBy('produit.nom', 'ASC')
            ->getQuery();

        $list = $query->getResult();
        $paginator = $this ->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );
        $pieChart = new PieChart();
        $totalHousings=0;
        $produit = $em->getRepository('BaskelBundle:Produit')->findAll();

        foreach($produit as $hs ){
            $totalHousings=$totalHousings+$hs->getQuantite();
        }
        $data=array();
        $stat=['produit','quantite'];
        $nb=0;
        array_push($data,$stat);
        foreach($produit as $produit){
            $stat=array();
            array_push($stat,$produit->getNom(),(($produit->getQuantite())*100)/$totalHousings);
            $nb=($produit->getQuantite()*100)/$totalHousings;
            $stat=[$produit->getNom(),$nb];
            array_push($data,$stat);
        }


        $pieChart->getData()->setArrayToDataTable( $data );
        $pieChart->getOptions()->setTitle('quantity of products ');
        $pieChart->getOptions()->setHeight(500); $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Baskel/Produit/affichePBack.html.twig',array(
            'produit'=>$pagination,'pieChart' => $pieChart

        ));

    }
    public function rechercheerp1Action(Request $request){

        $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $motcle = $request->get('motcle');

        $repository =$em->getRepository('BaskelBundle:Produit');
        $query = $repository->createQueryBuilder('produit')
            ->where('produit.nom like :name or produit.quantite like :name or produit.reference like :name or produit.prix like :name or produit.description like :name')
            ->setParameter('name', '%'.$motcle.'%')
            ->orderBy('produit.nom', 'ASC')
            ->getQuery();

        $list = $query->getResult();
        $paginator = $this ->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );

        return $this->render('@Baskel/Produit/afficheP.html.twig',array(
            'produit'=>$pagination,'categoriep' => $categoriep

        ));

    }
    public function filtreproduitAction(Request $request,$id){

        $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $motcle = $request->get('motcle');

        $repository =$em->getRepository('BaskelBundle:Produit');
        $query = $repository->createQueryBuilder('produit')
            ->where('IDENTITY(produit.idCategorie) like :id ')
            ->setParameter('id', '%'.$id.'%')
            ->orderBy('produit.nom', 'ASC')
            ->getQuery();

        $list = $query->getResult();
        $paginator = $this ->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );

        return $this->render('@Baskel/Produit/afficheP.html.twig',array(
            'produit'=>$pagination,'categoriep' => $categoriep

        ));

    }
    public function triproduitAction(Request $request,$id){

        $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $categoriep = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $motcle = $request->get('motcle');

        $repository =$em->getRepository('BaskelBundle:Produit');
        if($id=="2") {
            $query = $repository->createQueryBuilder('produit')
                ->orderBy('produit.prix', 'ASC')
                ->getQuery();
        }
        elseif($id=="1") {
            $query = $repository->createQueryBuilder('produit')
                ->orderBy('produit.nom', 'ASC')
                ->getQuery();
        }
        elseif($id=="3"){
            $query = $repository->createQueryBuilder('produit')
                ->orderBy('produit.prix', 'DESC')
                ->getQuery();
        }
        else{
            $query = $repository->createQueryBuilder('produit')
                ->getQuery();
        }
        $list = $query->getResult();
        $paginator = $this ->get('knp_paginator');
        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 4)

        );


        return $this->render('@Baskel/Produit/afficheP.html.twig',array(
            'produit'=>$pagination,'categoriep' => $categoriep

        ));

    }
    public function savepdfAction()
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->findAll();
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('@Baskel/Produit/pdf.html.twig', array(
            'produit' => $produit));

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }
    public function afficheProduitMAction()
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($produit);
        return new JsonResponse($formatted);



//...


    }
    public function afficheCatMAction()
    {


        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:CategorieP')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($produit);
        return new JsonResponse($formatted);



//...


    }

    public function likerJAction($id,$idU,$user)
    {
        $em = $this->getDoctrine()->getManager();
        $like = new Likes();
        $userid = $idU;
        $username = $user;
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Likes::class);
        $produit = $em->getRepository(Produit::class)->find($id);
        $likes = $repository->getCheckLikes($userid, $id);
        if (count($likes) == 0) {
            $like->setIdArticle($id);
            $like->setIdUser($userid);
            $like->setUsername($username);
            $em->persist($like);
            $em->flush();
            $serializer = new Serializer([new ObjectNormalizer()]);
            $formatted = $serializer->normalize($like);
            return new JsonResponse($formatted);
        }
        return new Response();
    }

    public function likerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $like = new Likes();
        $userid = $this->getUser()->getId();
        $username = $this->getUser();
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Likes::class);
        $produit = $em->getRepository(Produit::class)->find($id);


            $like->setIdArticle($id);
            $like->setIdUser($userid);
            $like->setUsername($username);
            $em->persist($like);
            $em->flush();

        return $this->render(
            '@Baskel/Produit/afficheDetailL.html.twig',
            array('produit' => $produit,'like'=>$like)
        );    }
    public function suppLikeAction($id,$idd)
    {

        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('BaskelBundle:Produit')->find($idd);






            $like = $em->getRepository('BaskelBundle:Likes')->findAll();
        foreach($like as $hs ){
            if($hs->getIdUser()==$id and $hs->getIdArticle()==$idd)
            {
                $em->remove($hs);
                $em->flush();
                return $this->render(
                    '@Baskel/Produit/afficheDetail.html.twig',
                    array('produit' => $produit,'like'=>$like)
                );
            }

        }





        return $this->render(
            '@Baskel/Produit/afficheDetail.html.twig',
            array('produit' => $produit,'like'=>$like)
        );










    }
    public function afficheLikeAction()
    {


        $em = $this->getDoctrine()->getManager();
        $like = $em->getRepository('BaskelBundle:Likes')->findAll();


        return $this->render('@Baskel/Produit/afficheLike.html.twig', array(
            'like' => $like));
    }


    public function supppLikeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $like = $em->getRepository('BaskelBundle:Likes')->find($id);

            $em->remove($like);
            $em->flush();




        return $this->render('@Baskel/Produit/afficheLike.html.twig', array(
            'like' => $like));


        }




}
