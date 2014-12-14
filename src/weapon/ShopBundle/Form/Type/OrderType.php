<?php

namespace weapon\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use weapon\ShopBundle\Entity\Product;
use weapon\ShopBundle\Entity\Order;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('product', 'choice', [
//                'choices' => Product::$Product,
//            ])
            ->add('quantity', 'integer')
            ->add('comment', 'text');
//            ->add('methodOfPayment ', 'choice', [
//                'choices' => methodOfPayment::$methodOfPayment,
//                'preferred_choices' => ['Card', 'Cash', 'Paypal'],
//                'data' => 'Card',
//            ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'weapon\ShopBundle\Entity\Order',
        ));
    }

    public function getName()
    {
        return 'order';
    }
}
