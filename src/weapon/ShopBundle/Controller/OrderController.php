<?php

namespace weapon\ShopBundle\Controller;

use Doctrine\ORM\EntityRepository;
use weapon\ShopBundle\Entity\Order;
use weapon\ShopBundle\Form\Type\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class OrderController extends Controller
{
    /**
     * @Template()
     * @Route("/order")
     * @Method({"GET", "POST"})
     */

    public function orderAction(Request $request)
    {
        // if ($request->isMethod('POST')) {
            $order = new Order();
        /** @var/ Symfony\Component\Form\FormTypeInterface $form */
            $form = $this->createForm(new OrderType, $order);
        $order->setCreatedAt($request->request->get('createdAt'));

            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($order);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirect($this->get('router')->generate('weapon_shop_order_order'));
            }

        return $this->render('weaponShopBundle:Default:order.html.twig', array(
                'form' => $form->createView()));
        // }
    }

    /**
     * @Template()
     * @Route("/success")
     * @Method({"POST"})
     */
    public function postOrderAction()
    {
        echo "Thank you for the order! Have a good hunt!";
    }

    /**
     * @return EntityRepository
     */
    protected function getOrderRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository('weaponShopBundle:Order')->findAll();
    }

}