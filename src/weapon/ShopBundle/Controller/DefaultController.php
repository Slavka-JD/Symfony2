<?php

namespace weapon\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use weapon\ShopBundle\Entity\Order;

class DefaultController extends Controller
{
    /**
     * @Template()
     * @Route("/")
     * @Method({"GET", "POST"})
     */

    public function indexAction()
    {
        $order = $this->getDoctrine()->getManager()->getRepository('weaponShopBundle:Order')->findAll();
        return ['order' => $order];
    }
}