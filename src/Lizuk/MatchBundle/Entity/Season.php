<?php

namespace Lizuk\MatchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\League;

/**
 * Season
 *
 * @ORM\Table(name="le_season")
 * @ORM\Entity
 */
class Season
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
     * @ORM\Column(type="string", name="name", length=20)
     */
    protected $name;

    /**
     * @var League[] | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\LeagueBundle\Entity\League", inversedBy="seasons")
     * @ORM\JoinTable(name="le_league_seasons",
     *      joinColumns={@ORM\JoinColumn(name="season_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="league_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $leagues;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active_season", type="boolean")
     */
    protected $activeSeason;

    /**
     * @var ArrayCollection | Round[]
     *
     * @ORM\OneToMany(targetEntity="Round", mappedBy="season")
     */
    protected $rounds;

    /**
     * Season constructor.
     */
    public function __construct()
    {
        $this->leagues = new ArrayCollection();
        $this->rounds = new ArrayCollection();
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
     * @return ArrayCollection|\Lizuk\LeagueBundle\Entity\League[]
     */
    public function getLeagues()
    {
        return $this->leagues;
    }

    /**
     * @param League $league
     * @return $this
     */
    public function addLeague(League $league)
    {
        if (!$this->leagues->contains($league)) {
            $this->leagues->add($league);
        }

        return $this;
    }

    /**
     * @param League $league
     * @return $this
     */
    public function removeLeague(League $league)
    {
        if ($this->leagues->contains($league)) {
            $this->leagues->removeElement($league);
        }

        return $this;
    }

    /**
     * @return boolean
     */
    public function isActiveSeason()
    {
        return $this->activeSeason;
    }

    /**
     * @param boolean $activeSeason
     */
    public function setActiveSeason($activeSeason)
    {
        $this->activeSeason = $activeSeason;
    }

    /**
     * @return ArrayCollection|Round[]
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * @param Round $round
     * @return $this
     */
    public function addRound(Round $round)
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);
        }

        return $this;
    }

    /**
     * @param Round $round
     * @return $this
     */
    public function removeRound(Round $round)
    {
        if ($this->rounds->contains($round)) {
            $this->rounds->removeElement($round);
        }

        return $this;
    }
}

