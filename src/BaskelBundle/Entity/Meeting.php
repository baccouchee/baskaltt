<?php

namespace BaskelBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Meeting
 *
 * @ORM\Table(name="Meeting")
 * @ORM\Entity(repositoryClass="BaskelBundle\Repository\MeetingRepository")

 */
class Meeting
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

/**
* @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @return \DateTime
     */

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startsDate", type="date")
     */
    private $startsDate;
    /**

       * @var string
     *@Assert\NotBlank(message="Empty subject")
     * @Assert\Length(min="4",minMessage="too Short !")
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $categorie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Meeting
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set startsDate
     *
     * @param \DateTime $startsDate
     *
     * @return Meeting
     */
    public function setStartsDate($startsDate)
    {
        $this->startsDate = $startsDate;

        return $this;
    }

    /**
     * Get startsDate
     *
     * @return \DateTime
     */
    public function getStartsDate()
    {
        return $this->startsDate;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Meeting
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Meeting
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}

