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
 * News
 *
 * @ORM\Entity(repositoryClass="Lizuk\SocialBundle\Entity\Repository\NewsRepository")
 * @ORM\Table(name="le_news")
 */
class News
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
     * @var string
     *
     * @ORM\Column(name="introduction", type="string", length=255)
     */
    protected $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="string")
     */
    protected $body;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @var Category | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\SocialBundle\Entity\Category", inversedBy="newses")
     */
    protected $categories;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     */
    protected $publishedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     */
    protected $updatedBy;

    /**
     * @var User | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Lizuk\UserBundle\Entity\User")
     * @ORM\JoinTable(name="le_news_allowed_users",
     *      joinColumns={@ORM\JoinColumn(name="news_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *      )
     */
    protected $allowedUsers;

    /**
     * @var File
     *
     * @ORM\OneToOne(targetEntity="Lizuk\MainBundle\Entity\File")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $image;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\LeagueBundle\Entity\Team")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $team;

    /**
     * @var League
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\LeagueBundle\Entity\League")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $league;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $source;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->allowedUsers = new ArrayCollection();
        $this->createdAt = new \DateTime();
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
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * @param string $introduction
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return ArrayCollection|Category
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category)
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    /**
     * @param Category
     * @return $this
     */
    public function removeNews(News $news)
    {
        if ($this->newses->contains($news)) {
            $this->newses->removeElement($news);
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return Person
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param Person $updatedBy
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }

    /**
     * @return ArrayCollection|Person
     */
    public function getAllowedUsers()
    {
        return $this->allowedUsers;
    }

    /**
     * @param ArrayCollection|Person $allowedUsers
     */
    public function setAllowedUsers($allowedUsers)
    {
        $this->allowedUsers = $allowedUsers;
    }

    /**
     * @return File
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param File $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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

}

