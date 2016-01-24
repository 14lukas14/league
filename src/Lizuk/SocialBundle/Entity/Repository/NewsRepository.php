<?php

namespace Lizuk\SocialBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function findAllOrderedByTitle()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT n FROM LizukSocialBundle:News n ORDER BY n.title ASC'
            )
            ->getResult();
    }
}