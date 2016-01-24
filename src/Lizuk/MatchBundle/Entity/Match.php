<?php

namespace Lizuk\MatchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\Team;

/**
 * Match
 *
 * @ORM\Table(name="le_match")
 * @ORM\Entity
 */
class Match
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
     * @var ArrayCollection | MatchEvent[]
     *
     * @ORM\OneToMany(targetEntity="MatchEvent", mappedBy="match")
     */
    protected $events;

    /**
     * @var Team
     *
     * @ORM\OneToOne(targetEntity="Lizuk\LeagueBundle\Entity\Team")
     * @ORM\JoinColumn(name="home_id", referencedColumnName="id", nullable=false)
     */
    protected $home;

    /**
     * @var Team
     *
     * @ORM\OneToOne(targetEntity="Lizuk\LeagueBundle\Entity\Team")
     * @ORM\JoinColumn(name="away_id", referencedColumnName="id", nullable=false)
     */
    protected $away;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint", name="home_goals")
     */
    protected $homeGoals;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint", name="away_goals")
     */
    protected $awayGoals;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", name="vo")
     */
    protected $vo;

    /**
     * Match constructor.
     */
    public function __construct()
    {
        $this->events = new ArrayCollection();
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
     * @return Team
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * @param Team $home
     */
    public function setHome($home)
    {
        $this->home = $home;
    }

    /**
     * @return Team
     */
    public function getAway()
    {
        return $this->away;
    }

    /**
     * @param Team $away
     */
    public function setAway($away)
    {
        $this->away = $away;
    }

    /**
     * @return int
     */
    public function getHomeGoals()
    {
        return $this->homeGoals;
    }

    /**
     * @param int $homeGoals
     */
    public function setHomeGoals($homeGoals)
    {
        $this->homeGoals = $homeGoals;
    }

    /**
     * @return int
     */
    public function getAwayGoals()
    {
        return $this->awayGoals;
    }

    /**
     * @param int $awayGoals
     */
    public function setAwayGoals($awayGoals)
    {
        $this->awayGoals = $awayGoals;
    }

    /**
     * @return boolean
     */
    public function isVo()
    {
        return $this->vo;
    }

    /**
     * @param boolean $vo
     */
    public function setVo($vo)
    {
        $this->vo = $vo;
    }

}

