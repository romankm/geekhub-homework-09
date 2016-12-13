<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Bucket;

class LoadBucketData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * @return array
     */
    function getDependencies()
    {
        return [
            LoadItemsData::class,
        ];
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $item1 = $this->getReference('item1');
        $item2 = $this->getReference('item2');
        $item3 = $this->getReference('item3');

        $bucket1 = new Bucket();
        $bucket1->addItem($item1);

        $bucket2 = new Bucket();
        $bucket2->addItem($item2);
        $bucket2->addItem($item3);

        $manager->persist($bucket1);
        $manager->persist($bucket2);

        $manager->flush();
    }
}
