<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\MatchBundle\Entity\MatchEvent;

/**
 * Player
 *
 * @ORM\Table(name="le_player")
 * @ORM\Entity
 */
class Player extends Person
{
    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     */
    protected $team;

    /**
     * @var ArrayCollection | MatchEvent[]
     *
     * @ORM\OneToMany(targetEntity="Lizuk\MatchBundle\Entity\MatchEvent", mappedBy="user")
     */
    protected $events;

    /**
     * @var ArrayCollection | MatchEvent[]
     *
     * @ORM\OneToMany(targetEntity="Lizuk\MatchBundle\Entity\MatchEvent", mappedBy="secondUser")
     */
    protected $anotherEvents;

    /**
     * Player constructor.
     */
    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->anotherEvents = new ArrayCollection();
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
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    /**
     * @return ArrayCollection|MatchEvent[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param MatchEvent $event
     *
     * @return $this
     */
    public function addEvent(MatchEvent $event)
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
        }

        return $this;
    }

    /**
     * @param MatchEvent $event
     *
     * @return $this
     */
    public function removeEvent(MatchEvent $event)
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|MatchEvent[]
     */
    public function getAnotherEvents()
    {
        return $this->anotherEvents;
    }

    /**
     * @param MatchEvent $event
     *
     * @return $this
     */
    public function addAnotherEvent(MatchEvent $event)
    {
        if (!$this->anotherEvents->contains($event)) {
            $this->anotherEvents->add($event);
        }

        return $this;
    }

    /**
     * @param MatchEvent $event
     *
     * @return $this
     */
    public function removeAnotherEvent(MatchEvent $event)
    {
        if ($this->anotherEvents->contains($event)) {
            $this->anotherEvents->removeElement($event);
        }

        return $this;
    }
}