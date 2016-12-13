<?php

namespace ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ItemRepository
 */
class ItemRepository extends EntityRepository
{
    /**
     * @param string $namePart
     * @return array
     */
    public function searchByName($namePart)
    {
        $qb = $this->createQueryBuilder('item');

        return $qb->select(['item'])
            ->where(
                $qb->expr()->like('item.name', ':namePart')
            )
            ->orderBy('item.name', 'DESC')
            ->setParameter('namePart', "%{$namePart}%")
            ->getQuery()
            ->getResult();
    }
}
