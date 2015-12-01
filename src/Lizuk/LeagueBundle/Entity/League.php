<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="name", type="text", nullable="true")
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
     */
    protected $subLeagues;


    /**
     * Return teams which play in this league
     *
     * @var
     */
    protected $teams;

    /**
     * League constructor.
     */
    public function __construct()
    {
        $this->subLeagues = new ArrayCollection();
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

}

