<?php

namespace weapon\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use weapon\ShopBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Template()
     * @Route("/")
     * @Method({"GET", "POST"})
     */

    public function indexAction()
    {
        $products = $this->getDoctrine()->getManager()->getRepository('weaponShopBundle:Product')->findOneBySlug($slug);
        return ['products' => $products];
    }
}