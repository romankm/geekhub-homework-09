<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Item;

/**
 * Class LoadItemsData
 */
class LoadItemsData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * @return array
     */
    function getDependencies()
    {
        return [
            LoadCategoryData::class,
        ];
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $item1 = new Item();
        $item1->setName('Bread');
        $item1->setPrice(10);
        $item1->setCategory(
            $this->getReference('food-category')
        );

        $item2 = new Item();
        $item2->setName('Ring 1');
        $item2->setPrice(40);
        $item2->setCategory(
            $this->getReference('jewelry-category')
        );

        $item3 = new Item();
        $item3->setName('Ring 2');
        $item3->setPrice(50);
        $item3->setCategory(
            $this->getReference('jewelry-category')
        );

        $manager->persist($item1);
        $manager->persist($item2);
        $manager->persist($item3);

        $manager->flush();

        $this->addReference('item1', $item1);
        $this->addReference('item2', $item2);
        $this->addReference('item3', $item3);
    }
}
