<?php

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activist
 *
 * @ORM\MappedSuperclass()
 */
class Person
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
     * @var integer
     *
     * @ORM\Column(type="string", nullable=true, length=11)
     */
    protected $pesel;

    /**
     * @var string
     *
     * @ORM\Column(type="gender_type")
     */
    protected $gender;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, length=40)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, length=40)
     */
    protected $lastName;

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
     * @return int
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * @param int $pesel
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

}

