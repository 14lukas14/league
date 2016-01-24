<?php

namespace Lizuk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use FOS\UserBundle\Model\User;
use Lizuk\MainBundle\Traits\SoftDeleteAble;

/**
 * Person
 *
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\MappedSuperclass()
 *
 */
class Person extends User
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
     * @var integer
     *
     * @ORM\Column(type="string", nullable=true, length=12)
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

//    /**
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $username;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $usernameCanonical;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $email;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $emailCanonical;
//
//    /**
//     * @var boolean
//     *
//     * @ORM\Column(type="boolean")
//     */
//    protected $enabled;
//
//    /**
//     * The salt to use for hashing
//     *
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $salt;
//
//    /**
//     * Encrypted password. Must be persisted.
//     *
//     * @var string
//     *
//     * @ORM\Column(type="string")
//     */
//    protected $password;
//
//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(type="datetime", nullable=true)
//     */
//    protected $lastLogin;
//
//    /**
//     * Random string sent to the user email address in order to verify it
//     *
//     * @var string
//     *
//     * @ORM\Column(type="string", nullable=true)
//     */
//    protected $confirmationToken;
//
//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(type="datetime", nullable=true)
//     */
//    protected $passwordRequestedAt;
//
//    /**
//     * @var Collection
//     */
//    //protected $groups;
//
//    /**
//     * @var boolean
//     *
//     * @ORM\Column(type="boolean")
//     */
//    protected $locked;
//
//    /**
//     * @var boolean
//     *
//     * @ORM\Column(type="boolean")
//     */
//    protected $expired;
//
//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(type="datetime", nullable=true)
//     */
//    protected $expiresAt;
//
//    /**
//     * @var array
//     *
//     * @ORM\Column(type="array")
//     */
//    protected $roles;
//
//    /**
//     * @var boolean
//     *
//     * @ORM\Column(type="boolean")
//     */
//    protected $credentialsExpired;
//
//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(type="datetime", nullable=true)
//     */
//    protected $credentialsExpireAt;

    public function __construct()
    {
        parent::__construct();
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

