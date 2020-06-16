<?php

namespace BaskelBundle\Controller;

use BaskelBundle\Entity\Article;
use BaskelBundle\Entity\Comment;
use BaskelBundle\Entity\PostLike;
use AppBundle\Entity\User;
use BaskelBundle\Form\CommentType;
use BaskelBundle\Repository\ArticleRepository;
use BaskelBundle\Repository\PostLikeRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use DateTime;
use Symfony\Component\HttpFoundation\File\File;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



/**
 * Article controller.
 *
 * @Route("article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     *
     * @Route("/", name="article_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();
        $articles = $em->getRepository('BaskelBundle:Article')->findByPage(
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
            'categories' => $categories,
        ));
    }

    public function indexbAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BaskelBundle:Article')->findAll();

        return $this->render('article/listMeetingBack.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('BaskelBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var  UploadedFile $file
             */
            $file=$article->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $em = $this->getDoctrine()->getManager();
            $today = new \DateTime('now');
            $article->setImage($fileName);
            $article->setDate($today);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_indexb', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article , Request $request )
    {

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('EventBundle:Categorie')->findAll();
        $comment = new Comment();
        $form = $this->createForm(CommentType::class ,$comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $cencure = array('idiots','abrutis','pute','fuck');
            $em = $this->getDoctrine()->getManager();
            $today = new \DateTime('now');
            $comment->setCreatedAt($today);
            $comment->setAuthor($user);
            $comment->setArticle($article);
            $message = $comment->getContent();

            for ($i =0 ; $i < sizeof($cencure) ; $i++)
            {
                if (strpos($message, $cencure[$i]))
                {
                    $message = str_replace($cencure[$i], "*******", $message);
                }
                $i++;
            }
            $comment->setContent($message);
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }
        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'categories' => $categories,
            'commentForm' => $form->createView()

        ));
    }

    public function showbAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/showBack.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $image = $article->getImage();
        $editForm = $this->createForm('BaskelBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            if($article->getImage()!=null)
            {
                /** @var UploadedFile $file */
                $file = $article->getImage();
                $filename = md5(uniqid()) . '.' . $file->guessExtension();
                /**
                 * @var TYPE_NAME $file
                 */
                $file->move($this->getParameter('image_directory'), $filename);
                $article->setImage($filename);
            }else
                {
                    $article->setImage($image);
                }

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));

        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_indexb');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function deleteCommentAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $comment=$em->getRepository('BaskelBundle:Comment')->find($id);
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('article_index');
    }


    /**
     *
     * @param Article $article
     * @return Response
     */
    public function likeAction(Article $article)
    {

        $manager=$this->getDoctrine()->getManager();
        $likeRepos=$manager->getRepository('BaskelBundle:PostLike');
        $user = $this->getUser();

      if(!$user) return  $this->json([
          'code' => 403,
          'message' => "Unauthorized"
      ], 403);


      if ($article->isLikedByUser($user)){
          $like = $likeRepos->findOneBy([
              'post' => $article,
              'user' => $user
          ]);
          $manager->remove($like);
          $manager->flush();

          return  $this->json([
              'code' => 200,
              'message' => 'like bien supprimé',
              'likes' =>$likeRepos->count(['post' =>$article])
          ],200);
      }

      $like = new PostLike();
      $like->setPost($article);
      $like->setUser($user);

      $manager->persist($like);
      $manager->flush();

      return $this->json([
          'code' => 200,
          'message'=> 'Like bien ajouté',
          'likes'=>$likeRepos->count(['post' =>$article])
      ], 200);


    }



    public function chartsRAction()
    {
        $pieChart = new PieChart();
        $em = $this->getDoctrine()->getManager();

        $article= $em->getRepository('BaskelBundle:Article')->findAll();
        $repository= $this->getDoctrine()->getManager()->getRepository(Article::class);
        $listes= $repository->myfindrec();
        $data=array();
        $a=['title','NB'];
        array_push($data,$a);
        foreach($listes as $c){
            $a=array($c['title'],$c['NB']);
            array_push($data,$a);

        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Articals');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('article/chartsR.html.twig', array('piechart' => $pieChart));
    }




//************************************************************************************************
//********************************************API JSON********************************************
//************************************************************************************************
//**
    public function allAction (){
        $em=$this->getDoctrine()->getManager();
        $articles=$em->getRepository('BaskelBundle:Article')->findAll();
        $encoders = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('comments','likes','user'));
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer = new Serializer(array($normalizer), array($encoders));
        $formatted = $serializer->normalize($articles);

        return new JsonResponse($formatted);



    }

    public function findAction($id, Request $request){
        $em =$this->getDoctrine()->getManager();
        $articles = $em->getRepository('BaskelBundle:Article')->find($id);
        $encoders = new JsonEncoder(); // If no need for XmlEncoder
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId(); // Change this to a valid method of your object
        });
        $serializer = new Serializer(array($normalizer), array($encoders));
        var_dump($serializer->serialize($articles, 'json'));
        return new JsonResponse($serializer);
    }

    public function addcomAction($id, Request $request){
        $em =$this->getDoctrine()->getManager();
        $articles = $em->getRepository('BaskelBundle:Article')->find($id);
        $encoders = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        //***************
       $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $comment = new Comment();
        $comment->setContent($request->get('content'));
        $comment->setAuthor($user);
        $today = new \DateTime('now');
        $comment->setCreatedAt($today);
        $comment->setArticle($articles);
        $em->persist($comment);
        $em->flush();
        //***************
        $serializer = new Serializer(array($normalizer), array($encoders));
        var_dump($serializer->serialize($articles, 'json'));
        return new JsonResponse($serializer);
    }

    public function deletecoAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $comments=$em->getRepository('BaskelBundle:Comment')->find($id);
        $em->remove($comments);
        $em->flush();
        $encoders = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer = new Serializer(array($normalizer), array($encoders));
        var_dump($serializer->serialize($comments, 'json'));
        return new JsonResponse($serializer);

    }



    public function jaimeAction($id, Request $request){

        $manager=$this->getDoctrine()->getManager();
        $likeRepos=$manager->getRepository('BaskelBundle:PostLike');
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $article= $manager->getRepository('BaskelBundle:Article')->find($id);
        $encoders = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        if(!$user) return  $this->json([
                'code' => 403,
                'message' => "Unauthorized"
            ], 403);


            if ($article->isLikedByUser($user)){
                $like = $likeRepos->findOneBy([
                    'post' => $article,
                    'user' => $user
                ]);
                $manager->remove($like);
                $manager->flush();

                return  $this->json([
                    'code' => 200,
                    'message' => 'like bien supprimé',
                    'likes' =>$likeRepos->count(['post' =>$article])
                ],200);
            }

            $like = new PostLike();
            $like->setPost($article);
            $like->setUser($user);

            $manager->persist($like);
            $manager->flush();

            return $this->json([
                'code' => 200,
                'message'=> 'Like bien ajouté',
                'likes'=>$likeRepos->count(['post' =>$article])
            ], 200);


        $serializer = new Serializer(array($normalizer), array($encoders));
        var_dump($serializer->serialize($articles, 'json'));
        return new JsonResponse($serializer);

    }



    public function allArticleAction()
    {
        $em=$this->getDoctrine()->getManager();
        $avis=$em->getRepository('BaskelBundle:Article')->findAll();

        return new Response(json_encode($avis));

    }

    public function findMAction($id)
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('BaskelBundle:User')
            ->findOneBy(['username' => $id]);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
//**
//************************************************************************************************
//********************************************API JSON********************************************
//************************************************************************************************



    public function likeMAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $like = new PostLike();
        $id=$request->get('id');
        $entitymanager = $this->getDoctrine()->getManager();
        $user= $entitymanager->getRepository('BaskelBundle:User')->find(1);

        $article =$em->getRepository('BaskelBundle:Article')->find($id);
        $like->setPost($article);
        $like->setUser($user);
        $em->persist($like);
        $em->flush();
        $encoders = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('comments','likes','user'));
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer = new Serializer(array($normalizer), array($encoders));
        $formatted = $serializer->normalize($like);

        return new JsonResponse($formatted);

    }

    public function dsilikeMAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $id_article= $request->get('id_article');
        $entitymanager = $this->getDoctrine()->getManager();
        $user= $entitymanager->getRepository(User::class)->find(1);
        $like = $em->getRepository(PostLike::class)->findBy(array('post'=>$id_article, 'user'=>$user));
        $em->remove($like);
        $em->flush();
        $serializer= new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($like);
        return new JsonResponse($formatted);

    }


}
