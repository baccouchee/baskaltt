<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var string
     *
     * @ORM\Column(name="qrcode", type="string", length=255)
     */
    private $qrcode;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="idU",referencedColumnName="id")
     */
    private $idU;

    /**
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="idE",referencedColumnName="id")
     */
    private $idE;

    /**
     * @return int
     */



    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdU()
    {
        return $this->idU;
    }

    /**
     * @param mixed $idU
     */
    public function setIdU($idU)
    {
        $this->idU = $idU;
    }

    /**
     * @return mixed
     */
    public function getIdE()
    {
        return $this->idE;
    }

    /**
     * @param mixed $idE
     */
    public function setIdE($idE)
    {
        $this->idE = $idE;
    }
    /**
     * @return string
     */
    public function getQrcode()
    {
        return $this->qrcode;
    }

    /**
     * @param string $qrcode
     */
    public function setQrcode($qrcode)
    {
        $this->qrcode = $qrcode;
    }


}

