<?php

namespace ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BucketRepository
 */
class BucketRepository extends EntityRepository
{
    public function findItemCategories()
    {
        $qb = $this->createQueryBuilder('bucket');

        return $qb->select('category')
            ->leftJoin('bucket.items', 'item')
            ->leftJoin('item.category', 'category')
            ->getQuery()
            ->getResult();
    }
}
