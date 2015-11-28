<?php
/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-02
 * Time: 18:24
 */

namespace Lizuk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserAttribute
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user_attribute")
 */
class UserAttribute extends Attribute
{
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="attributes", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    public function __construct(User $user, $name, $value)
    {
        $this->user = $user;

        parent::__construct($name, $value);
    }
}