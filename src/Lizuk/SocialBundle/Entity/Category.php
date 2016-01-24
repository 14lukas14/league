<?php

namespace Lizuk\SocialBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\LeagueBundle\Entity\League;
use Lizuk\LeagueBundle\Entity\Team;
use Lizuk\MainBundle\Entity\File;
use Lizuk\MainBundle\Traits\SoftDeleteAble;
use Lizuk\UserBundle\Entity\User;

/**
 * Category
 *
 * @ORM\Entity
 * @ORM\Table(name="le_category")
 */
class Category
{
    use SoftDeleteAble;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    /**
     * @var League
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\LeagueBundle\Entity\League")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $league;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\LeagueBundle\Entity\Team")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $team;

    /**
     * @var News | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\SocialBundle\Entity\News", inversedBy="categories")
     * @ORM\JoinTable(name="le_news_categories",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="news_id", referencedColumnName="id")}
     *      )
     */
    protected $newses;

    public function __construct()
    {
        $this->newses = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return ArrayCollection|News
     */
    public function getNewses()
    {
        return $this->newses;
    }

    /**
     * @param News $news
     * @return $this
     */
    public function addNews(News $news)
    {
        if (!$this->newses->contains($news)) {
            $this->newses->add($news);
        }

        return $this;
    }

    /**
     * @param News $news
     * @return $this
     */
    public function removeNews(News $news)
    {
        if ($this->newses->contains($news)) {
            $this->newses->removeElement($news);
        }

        return $this;
    }

}

