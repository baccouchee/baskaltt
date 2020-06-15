<?php

namespace ChtbaskelBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Station
 *
 * @ORM\Table(name="station")
 * @UniqueEntity("nomStation")
 * @ORM\Entity(repositoryClass="ChtbaskelBundle\Repository\StationRepository")
 */
class Station
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="nom_station", type="string", length=255)
     */
    private $nomStation;

    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @Assert\Range(min = -180,max = 180)
     * @ORM\Column(name="longitude", type="decimal", precision=10, scale=5)
     */
    private $longitude;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Range(min = -90,max = 90)
     * @ORM\Column(name="latitude", type="decimal", precision=10, scale=5)
     */
    private $latitude;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="nbrVelo", type="integer")
     */
    private $nbrVelo;


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
     * Set nomStation
     *
     * @param string $nomStation
     *
     * @return Station
     */
    public function setNomStation($nomStation)
    {
        $this->nomStation = $nomStation;

        return $this;
    }

    /**
     * Get nomStation
     *
     * @return string
     */
    public function getNomStation()
    {
        return $this->nomStation;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Station
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Station
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set nbrVelo
     *
     * @param integer $nbrVelo
     *
     * @return Station
     */
    public function setNbrVelo($nbrVelo)
    {
        $this->nbrVelo = $nbrVelo;

        return $this;
    }

    /**
     * Get nbrVelo
     *
     * @return int
     */
    public function getNbrVelo()
    {
        return $this->nbrVelo;
    }
}

