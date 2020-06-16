<?php

namespace BaskelBundle\Entity;
use AppBundle\AppBundle;
use BaskelBundle\Entity\PostLike;
use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use JsonSerializable;


/**
 * Article
 *
 * @ORM\Table(name="Article")
 * @ORM\Entity(repositoryClass="BaskelBundle\Repository\ArticleRepository")
 */
class Article implements JsonSerializable
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     */

    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="BaskelBundle\Entity\Category", inversedBy="articles")
     * @ORM\JoinColumn
     */
    private $category;

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


    /**
     * @ORM\OneToMany(targetEntity="BaskelBundle\Entity\Comment" , mappedBy="article", orphanRemoval=true)
     */
    private $comments;


    /**
     * @ORM\OneToMany(targetEntity="BaskelBundle\Entity\PostLike" , mappedBy="post")
     */
    private $likes;

    /**
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }


    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }



    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Assert\Length(min=10, max=255, minMessage="Votre titre est bien trop court!")
     */
    private $title;

    /**
     * @var string
     * @Assert\Length(min=10, minMessage="Le contenu est bien trop court!")
     * @ORM\Column(name="content", type="text")
     * 
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\Image()
     * 
     */
    private $image;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     * 
     */
    private $date;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return Article
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Collection|PostLike[]
     */
    public function getLikes()
    {
        return  $this->likes;
    }

    public function addlike(PostLike $like)
    {
        if (!$this->likes->contains($like)){
            $this->likes[] = $like;
            $like->setPost($this);
        }
        return $this;
    }

    public function removeLike(PostLike $like)
    {
        if($this->likes->contains($like)){
            $this->likes->removeElement($like);
               if($like->getPost() === $this){
                   $like->setPost(null);
               }
        }
        return $this;
    }

    /**
     * @param User $user
     * @return boolean
     */
    public function isLikedByUser(User $user)
    {
       foreach ($this->likes as $like){
           if($like->getUser() === $user) return  true;
       }
       return false;
    }
    public function jsonSerialize()
    {
        return
            [
                'idArticle'   => $this->getId(),
                'title' => $this->getTitle(),
                'content' => $this->getContent(),
                'image' => $this ->getImage(),
                'date' => $this ->getDate(),
                'category' => $this ->getCategory(),

            ];
    }
}
