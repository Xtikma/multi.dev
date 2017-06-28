<?php

namespace IcoderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class competitorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('lastname1')
                ->add('lastname2')
                ->add('dni')
                ->add('emil')
                ->add('telephone')
                ->add('height')
                ->add('wight')
                ->add('blood')
                ->add('address')
                ->add('active')
                ->add('canton')
                ->add('type')
                ->add('teams');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IcoderBundle\Entity\competitor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'icoderbundle_competitor';
    }


}
