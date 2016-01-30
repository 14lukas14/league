<?php

namespace Lizuk\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Tag
 *
 * @ORM\Entity
 * @ORM\Table(name="le_tag")
 */
class Tag
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    protected $name;

    public function __construct() {}

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function isSame($name)
    {
        return mb_strtolower($this->name) === mb_strtolower($name);
    }

}

