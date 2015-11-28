<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="le_stadium")
 * @ORM\Entity
 */
class Stadium
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $description;

    /**
     * @var ArrayCollection | Team[]
     *
     * @ORM\OneToMany(targetEntity="Team", mappedBy="stadium", cascade={"persist"})
     */
    protected $teams;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $foundedAt;

    /**
     * @var double
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $longitude;

    /**
     * @var double
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $latitude;

    /**
     * Stadium constructor.
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection|Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param ArrayCollection|Team[] $teams
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
    }

    /**
     * @return \DateTime
     */
    public function getFoundedAt()
    {
        return $this->foundedAt;
    }

    /**
     * @param \DateTime $foundedAt
     */
    public function setFoundedAt($foundedAt)
    {
        $this->foundedAt = $foundedAt;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
}

