<?php

namespace weapon\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('email', 'email');
        $builder->add('plainPassword', 'repeated', array(
            'first_name' => 'plainPassword',
            'second_name' => 'confirm',
            'type' => 'plainPassword',
        ));
        $builder->add('country', 'choice', [
            'choices' => Countries::$countries,
            'preferred_choices' => ['UA', 'US'],
            'data' => 'UA',
        ]);
        $builder->add('address', 'text');
        $builder->add('phone', 'text');
        $builder->add('cardNumber', 'integer');
        $builder->add('CVCCode', 'integer');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'weapon\ShopBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}