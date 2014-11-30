<?php

namespace weapon\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Template()
     * @Route("/")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return $this->render('weaponShopBundle:Default:index.html.twig');
    }
}
