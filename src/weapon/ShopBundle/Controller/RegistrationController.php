<?php

namespace weapon\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use weapon\ShopBundle\Form\Type\RegistrationType;
use weapon\ShopBundle\Entity\Registration;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    /**
     * @Template()
     * @Route("/register")
     * @Method({"GET", "POST"})
     */
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('weapon_shop_registration_create'),
        ));

        return $this->render(
            'weaponShopBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Template()
     * @Route("/register/create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);
        if ($form->isValid()) {
            $registration = $form->getData();
            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirect($this->get('router')->generate('weapon_shop_default_index'));
        }

        return $this->render(
            'weaponShopBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }
}