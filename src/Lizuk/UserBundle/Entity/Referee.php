<?php

namespace Lizuk\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\League;

/**
 * Referee
 *
 * @ORM\Entity
 */
class Referee extends User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var ArrayCollection | League[]
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\LeagueBundle\Entity\League", inversedBy="referees")
     * @ORM\JoinTable(name="league_referees",
     *      joinColumns={@ORM\JoinColumn(name="referee_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="league_id", referencedColumnName="id")}
     *      )
     */
    protected $leagues;

    /**
     * Referee constructor.
     */
    public function __construct()
    {
        $this->leagues = new ArrayCollection();
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
     * @return ArrayCollection|League[]
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
}

