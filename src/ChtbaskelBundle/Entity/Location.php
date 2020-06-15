<?php

namespace ChtbaskelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="ChtbaskelBundle\Repository\LocationRepository")
 */
class Location
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id")
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity="Station")
     * @ORM\JoinColumn(name="idstation",referencedColumnName="id")
     */
    private $idstation;


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
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Location
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idstation
     *
     * @param integer $idstation
     *
     * @return Location
     */
    public function setIdstation($idstation)
    {
        $this->idstation = $idstation;

        return $this;
    }

    /**
     * Get idstation
     *
     * @return int
     */
    public function getIdstation()
    {
        return $this->idstation;
    }
}

