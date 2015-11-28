<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="le_team")
 * @ORM\Entity
 */
class Team
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
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $description;

    /**
     * @var League
     *
     * @ORM\ManyToOne(targetEntity="League", inversedBy="teams")
     */
    protected $league;

    /**
     * @var Trainer
     *
     * @ORM\OneToOne(targetEntity="Trainer", mappedBy="team")
     * @ORM\JoinColumn(name="trainer_id", referencedColumnName="id")
     */
    protected $trainer;

    /**
     * @var ArrayCollection | Player[]
     *
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     */
    protected $players;

    /**
     * @var Stadium
     *
     * @ORM\ManyToOne(targetEntity="Stadium", inversedBy="teams")
     */
    protected $stadium;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $foundedAt;

//    /**
//     * @var ArrayCollection | string[]
//     *
//     * @ORM\ManyToOne()
//     */
//    protected $colors;

    /**
     * @var ArrayCollection | TeamAttribute[]
     *
     * @ORM\OneToMany(targetEntity="TeamAttribute", mappedBy="team")
     */
    protected $attributes;

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
     * Team constructor.
     */
    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->attributes = new ArrayCollection();
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
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @return League
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * @param League $league
     */
    public function setLeague($league)
    {
        $this->league = $league;
    }

    /**
     * @return Trainer
     */
    public function getTrainer()
    {
        return $this->trainer;
    }

    /**
     * @param Trainer $trainer
     */
    public function setTrainer($trainer)
    {
        $this->trainer = $trainer;
    }

    /**
     * @return ArrayCollection|Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param Player $player
     * @return $this
     */
    public function addPlayer(Player $player)
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);

            $player->setTeam($this);
        }

        return $this;
    }

    /**
     * @param Player $player
     * @return $this
     */
    public function removePlayer(Player $player)
    {
        if ($this->players->contains($player)) {
            $this->players->removeElement($player);

            $player->setTeam(null);
        }

        return $this;
    }

    /**
     * @return Stadium
     */
    public function getStadium()
    {
        return $this->stadium;
    }

    /**
     * @param Stadium $stadium
     */
    public function setStadium($stadium)
    {
        $this->stadium = $stadium;
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
     * @return ArrayCollection|TeamAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param TeamAttribute $attribute
     * @return $this
     */
    public function addAttribute(TeamAttribute $attribute)
    {
        if (!$this->attributes->contains($attribute)) {
            $this->attributes->add($attribute);
        }

        return $this;
    }

    /**
     * @param TeamAttribute $attribute
     * @return $this
     */
    public function removeAttribute(TeamAttribute $attribute)
    {
        if ($this->attributes->contains($attribute)) {
            $this->attributes->removeElement($attribute);
        }

        return $this;
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

