<?php

namespace weapon\ShopBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use weapon\ShopBundle\Entity\Product;
use weapon\ShopBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/order")
 */

class OrderController extends Controller
{
    /**
     * @Template()
     * @Route("/sales/{slug}")
     * @Method({"GET", "POST"})
     */
    public function saleAction(Request $request)
    {
        $order = $this->getOrderRepository()->findAll();
        if ($request->isMethod('POST')) {
            $order = new Order();
            $order
                ->setProduct($product)
                ->setQuantity($request->request->get('quantity'))
                ->setCreatedAt($request->request->get('createdAt'))
                ->setMethodOfPayment($request->request->get('method-of-payment'))
                ->setComment($request->request->get('comment'));

            $this->getDoctrine()->getManager()->persist($order);
            $this->getDoctrine()->getManager()->flush();
        }

        return ['order' => $order];
    }

    /**
     * @return EntityRepository
     */
    protected function getOrderRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository('MiniShopBundle:Order')->findAll();
    }

    /**
     * @Template()
     * @Route("/orders")
     * @Method({"POST"})
     */
    public function postOrderAction()
    {
        echo "Thank you for the order! Have a good hunt!";
    }

}