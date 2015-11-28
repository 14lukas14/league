<?php

namespace Lizuk\MainBundle\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-02
 * Time: 20:38
 *
 * Trait used to serving soft deleting in entities
 */

trait SoftDeleteAble {

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt = null;

    /**
     * @return DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * Check object is deleted
     *
     * @return bool
     */
    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
    }
}