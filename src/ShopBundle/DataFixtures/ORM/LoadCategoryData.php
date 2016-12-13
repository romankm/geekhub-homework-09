<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Category;

/**
 * Class LoadData
 */
class LoadCategoryData extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Food');

        $category2 = new Category();
        $category2->setName('Jewelry');

        $manager->persist($category1);
        $manager->persist($category2);

        $manager->flush();

        $this->addReference('food-category', $category1);
        $this->addReference('jewelry-category', $category2);
    }
}
