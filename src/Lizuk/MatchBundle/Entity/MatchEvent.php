<?php

namespace Lizuk\MatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\Player;

/**
 * MatchEvent
 *
 * @ORM\Table(name="le_match_event")
 * @ORM\Entity
 */
class MatchEvent
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
     * @var Match
     *
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="events")
     * @ORM\JoinColumn(name="match_id")
     */
    protected $match;

    /**
     * @var string
     * @ORM\Column(type="MatchEventType")
     */
    protected $type;

    /**
     * @var Player
     *
     * @ORM\OneToMany(targetEntity="Lizuk\LeagueBundle\Entity\Player", mappedBy="events")
     */
    protected $user;

    /**
     * @var Player
     *
     * @ORM\OneToMany(targetEntity="Lizuk\LeagueBundle\Entity\Player", mappedBy="anotherEvents")
     */
    protected $secondUser;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $minute;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $comment;


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
     * @return Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @param Match $match
     */
    public function setMatch($match)
    {
        $this->match = $match;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return Player
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Player $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Player
     */
    public function getSecondUser()
    {
        return $this->secondUser;
    }

    /**
     * @param Player $secondUser
     */
    public function setSecondUser($secondUser)
    {
        $this->secondUser = $secondUser;
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param int $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

}

