<?php
/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-27
 * Time: 17:56
 */

namespace Lizuk\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * File
 * @ORM\Table(name="le_file", indexes={@ORM\Index(name="checksum_idx", columns={"checksum"})})
 *
 * @ORM\Entity
 */
class File
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
     * @var File
     *
     * @ORM\ManyToOne(targetEntity="Lizuk\MainBundle\Entity\File", inversedBy="children")
     * @ORM\JoinColumn(onDelete="SET NULL", nullable=true)
     */
    private $parent;

    /**
     * @var File[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Lizuk\MainBundle\Entity\File", mappedBy="parent")
     */
    private $children;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="checksum", type="string", length=255)
     */
    private $checksum;

    /**
     * @var string
     *
     * @ORM\Column(name="checksum_type", type="string", length=30)
     */
    private $checksumType = "sha256";

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
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
     * Set path
     *
     * @param string $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return File
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return File
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set checksum
     *
     * @param integer $checksum
     * @return File
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * Get checksum
     *
     * @return integer
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    public function setContent($content)
    {
        $this->setChecksum(hash($this->getChecksumType(), $content));

        $this->setContent($content);

        $this->setSize(0);

        return $this;
    }

    /**
     * Gets file contents
     *
     * @return string
     * @deprecated Use File::getStreamPath with PHP file functions instead.
     */
    public function getContent()
    {
        //return $this->getGaufretteFile()->getContent();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function setChecksumType($type)
    {
        $this->checksumType = $type;
    }

    public function getChecksumType()
    {
        return $this->checksumType;
    }

    /**
     * @return File
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param File $parent
     */
    public function setParent($parent = null)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection|File[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return ArrayCollection|FileAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttribute($name, $default = null)
    {
        if ($this->attributes->containsKey($name)) {
            return $this->attributes[$name]->getValue();
        }
        return $default;
    }

    public function setAttribute($name, $value)
    {
        if ($this->attributes[$name]) {
            $this->attributes[$name]->setValue($value);
        } else {
            $this->attributes[$name] = new FileAttribute($this, $name, $value);
        }
    }

    public function removeAttribute($name)
    {
        unset($this->attributes[$name]);
    }

    public function clearAttributes()
    {
        $this->attributes->clear();
    }
}
