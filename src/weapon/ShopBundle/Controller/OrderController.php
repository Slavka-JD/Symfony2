<?php

namespace weapon\ShopBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use weapon\ShopBundle\Entity\Order;
use weapon\ShopBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use weapon\ShopBundle\Form\Type\AddOrder;

/**
 * @Route("/order")
 */

class OrderController extends Controller
{
    /**
     * @Template()
     * @Route("/sales")
     * @Method({"GET", "POST"})
     */

    public function newOrder(Request $request)
    {
        if ($request->isMethod('POST')) {
            $order = new Order();
            $form = $this->createForm(new OrderType, $order);
            $form = $this->setCreatedAt($request->request->get('createdAt'));

            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($order);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirect($this->get('router')->generate('weapon_shopbundle_index_index'));
            }

            return $this->render('weaponShopBundle:Default:orderFormType.html.twig', array(
                'form' => $form->createView()));
        }
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