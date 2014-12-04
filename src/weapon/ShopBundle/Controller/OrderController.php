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

class OrderController extends Controller
{
    /**
     * @Template()
     * @Route("/new")
     * @Method({"GET", "POST"})
     */
    public function findAction(Request $request)
    {
        $product = $this->getProductRepository()->findOneBySlug($slug);
        if ($request->isMethod('POST')) {
            $product = new Product();
            $product
                ->setName()($request->request->get('name'))
                ->setPrice($request->request->get('price'))
                ->setCategoryProduct($request->request->get('CategoryProduct'))
                ->setProduct($this->getProductRepository()->find($request->request->get('product')));
            $this->getDoctrine()->getManager()->persist($product);
            $this->getDoctrine()->getManager()->flush();
        }
        return ['products' => $this->getProductRepository()->findAll()];
    }

    /**
     * @Template()
     * @Route("/sales/{slug}")
     * @Method({"GET", "POST"})
     */
    public function saleAction(Request $request, $slug)
    {
        $order = $this->getOrderRepository()->findOneBySlug($slug);
        if ($request->isMethod('POST')) {
            $order = new Order();
            $order
                ->setProduct($product)
                ->setQuantity($request->request->get('quantity'))
                ->setMethodOfPayment($request->request->get('method-of-payment'))
                ->setComment($request->request->get('comment'));
            $this->getDoctrine()->getManager()->persist($order);
            $this->getDoctrine()->getManager()->flush();
        }
        return ['order' => $order];
    }
}
