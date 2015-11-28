<?php

namespace Lizuk\MatchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\League;
use Lizuk\MatchBundle\Entity\Match;

/**
 * Round
 *
 * @ORM\Table(name="le_round")
 * @ORM\Entity
 */
class Round
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
     * @var integer
     * @ORM\Column(type="smallint")
     */
    protected $number;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $end;

    /**
     * @var ArrayCollection | Match[]
     *
     * @ORM\OneToMany(targetEntity="Match", mappedBy="round")
     */
    protected $matches;

    /**
     * @var League
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\LeagueBundle\Entity\League", inversedBy="rounds")
     * @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     */
    protected $league;

    /**
     * @var Season
     *
     * @ORM\ManyToOne(targetEntity="Season", inversedBy="rounds")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;

    public function __construct()
    {
        $this->matches = new ArrayCollection();
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
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param integer $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return \Datetime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end)
    {
        $this->end = $end;
    }

    /**
     * @return ArrayCollection|Match[]
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * @param Match $match
     * @return $this
     */
    public function addMatch(Match $match)
    {
        if (!$this->matches->contains($match)) {
            $this->matches->add($match);
        }

        return $this;
    }

    /**
     * @param Match $match
     * @return $this
     */
    public function removeMatch(Match $match)
    {
        if ($this->matches->contains($match)) {
            $this->matches->removeElement($match);
        }

        return $this;
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
    public function setLeague(League $league)
    {
        $this->league = $league;
    }

    /**
     * @return Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param Season $season
     */
    public function setSeason(Season $season)
    {
        $this->season = $season;
    }

}

