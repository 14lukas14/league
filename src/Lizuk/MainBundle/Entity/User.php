<?php

namespace Lizuk\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lizuk\MainBundle\Entity\Person as BaseUser;

/**
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="fos_user",indexes={ @ORM\Index(name="role_idx", columns = {"role"}) })
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "user"  = "Lizuk\MainBundle\Entity\User",
 *     "superadmin"  = "Lizuk\MainBundle\Entity\SuperAdmin",
 *     "admin"  = "Lizuk\MainBundle\Entity\Admin",
 *     "referee"  = "Lizuk\MainBundle\Entity\Referee",
 * })
 */

class User extends BaseUser
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
     * @var ArrayCollection | UserAttribute[]
     *
     * @ORM\OneToMany(targetEntity="UserAttribute", mappedBy="user")
     */
    protected $attributes;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $role;

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
     * @return ArrayCollection|UserAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function addAttribute(UserAttribute $attribute)
    {
        if (!$this->attributes->contains($attribute)) {
            $this->attributes->add($attribute);
        }

        return $this;
    }

    public function removeAttribute(UserAttribute $attribute)
    {
        if ($this->attributes->contains($attribute)) {
            $this->attributes->remove($attribute);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getDiscr()
    {
        return 'user';
    }
}

