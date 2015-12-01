<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Punishment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Punishment
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

