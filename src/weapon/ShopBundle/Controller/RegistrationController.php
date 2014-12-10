<?php

namespace weapon\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use weapon\ShopBundle\Form\Type\RegistrationType;
use weapon\ShopBundle\Entity\Registration;

class RegistrationController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'weaponShopBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }
}