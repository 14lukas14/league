<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="le_team")
 * @ORM\Entity
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    protected $name;

    protected $description;

    protected $league;

    //protected $trainer; not yet

    //protected $players; not yet

    //protected $stadium; not yet

    protected $foundedAt;

    protected $colors;

    //protected $teamAttributes; not yet

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

