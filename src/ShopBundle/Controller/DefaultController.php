<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Item;
use ShopBundle\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    public function indexAction($itemName)
    {
        /** @var ItemRepository $repository */
        $repository = $this->getDoctrine()->getEntityManager()->getRepository(Item::class);

        $items = $repository->searchByName($itemName);

        return $this->render('ShopBundle:Default:index.html.twig', [
            'items' => $items,
        ]);
    }
}
