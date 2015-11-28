<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\MainBundle\Entity\Referee;
use Lizuk\MatchBundle\Entity\Round;
use Lizuk\MatchBundle\Entity\Season;

/**
 * League
 *
 * Entity describe LEAGUE object
 *
 * @ORM\Table(name="le_league")
 * @ORM\Entity
 */
class League
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
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;


    /**
     * @var League
     *
     * @ORM\OneToOne(targetEntity="Lizuk\LeagueBundle\Entity\League")
     * @ORM\JoinColumn(name="sup_league_id", referencedColumnName="id")
     */
    protected $supLeague;

    /**
     * @var ArrayCollection | League[]
     *
     * @ORM\ManyToMany(targetEntity="League")
     * @ORM\JoinTable(name="le_league_sub_leagues",
     *      joinColumns={@ORM\JoinColumn(name="league_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sub_league_id", referencedColumnName="id", unique=true)}
     *     )
     */
    protected $subLeagues;


    /**
     * Return teams which play in this league
     *
     * @var ArrayCollection | Team[]
     *
     * @ORM\OneToMany(targetEntity="Team", mappedBy="league")
     */
    protected $teams;

    /**
     * @var ArrayCollection | Season
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\MatchBundle\Entity\Season", mappedBy="leagues")
     */
    protected $seasons;

    /**
     * @var ArrayCollection | Round[]
     *
     * @ORM\OneToMany(targetEntity="Lizuk\MatchBundle\Entity\Round", mappedBy="league")
     */
    protected $rounds;

    /**
     * @var ArrayCollection | Referee[]
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\MainBundle\Entity\Referee", mappedBy="leagues")
     */
    protected $referees;

    /**
     * League constructor.
     */
    public function __construct()
    {
        $this->subLeagues = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->referees = new ArrayCollection();
        $this->seasons = new ArrayCollection();
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
     * @return mixed
     */
    public function getSupLeague()
    {
        return $this->supLeague;
    }

    /**
     * @param mixed $supLeague
     */
    public function setSupLeague($supLeague)
    {
        $this->supLeague = $supLeague;
    }

    /**
     * @return mixed
     */
    public function getSubLeagues()
    {
        return $this->subLeagues;
    }

    /**
     * Add league to subleagues.
     *
     * @param League $league
     * @return $this
     */
    public function addSubLeague(League $league)
    {
        if (!$this->subLeagues->contains($league)) {
            $this->subLeagues->add($league);
        }

        return $this;
    }

    /**
     * Remove league from subleagues.
     *
     * @param League $league
     * @return $this
     */
    public function removeSubLeague(League $league)
    {
        if ($this->subLeagues->contains($league)) {
            $this->subLeagues->removeElement($league);
        }

        return $this;
    }

    /**
     * Return teams, which play in this league.
     *
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add Team to league
     *
     * @param Team $team
     * @return $this
     */
    public function addTeam(Team $team)
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
        }

        return $this;
    }

    /**
     * Remove Team from league
     *
     * @param Team $team
     * @return $this
     */
    public function removeTeam(Team $team)
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Season
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    public function addSeason(Season $season)
    {
        if (!$this->seasons->contains($season)) {
            $this->seasons->add($season);
        }

        return $this;
    }

    public function removeLeague(Season $season)
    {
        if ($this->seasons->contains($season)) {
            $this->seasons->removeElement($season);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|\Lizuk\MatchBundle\Entity\Round[]
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    public function addRound(Round $round)
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);

            $round->setLeague($this);
        }

        return $this;
    }

    public function removeRound(Round $round)
    {
        if ($this->rounds->contains($round)) {
            $this->rounds->removeElement($round);

            $round->setLeague(null);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Referee[]
     */
    public function getReferees()
    {
        return $this->referees;
    }

    public function addReferee(Referee $referee)
    {
        if (!$this->referees->contains($referee)) {
            $this->referees->add($referee);

            $referee->addLeague($this);
        }

        return $this;
    }

    public function removeReferee(Referee $referee)
    {
        if ($this->referees->contains($referee)) {
            $this->referees->removeElement($referee);

            $referee->removeLeague($this);
        }

        return $this;
    }
}

