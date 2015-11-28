<?php
/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-02
 * Time: 18:23
 */

namespace Lizuk\MainBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Attribute
 *
 * @ORM\MappedSuperclass
 */
abstract class Attribute
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
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="value", type="text")
     */
    private $value;

    public function __construct($name, $value)
    {
        $this->setName($name);
        $this->setValue($value);
    }

    public function __toString()
    {
        return $this->getValue();
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

    /**
     * @return string
     */
    public function getValue()
    {
        if (strpos($this->value, 'O:') === 0 || strpos($this->value, 'a:') === 0) {
            return unserialize($this->value); // TODO: cache unserialized value
        }
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        if (is_array($value) || is_object($value)) {
            $value = serialize($value);
        }

        $this->value = $value;
    }
}