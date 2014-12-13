<?php

namespace weapon\ShopBundle\Controller;

use weapon\ShopBundle\Form\Type\RegistrationType;
use weapon\ShopBundle\Entity\Registration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class RegistrationSubmissionController extends Controller
{
    /**
     * @Template()
     * @Route("/registrationsubmission")
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

            return $this->redirect($this->get('router')->generate('weapon_shopbundle_index_index'));
        }

        return $this->render(
            'weaponShopBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
