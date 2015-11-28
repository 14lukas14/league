<?php

namespace Lizuk\MatchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
}

