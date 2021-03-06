<?php

namespace IcoderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                ->add('blood', ChoiceType::class, array(
                    'choices' => array('NA' => 'NA',
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-'
                        )
                ))
                ->add('address')
                ->add('active')
                ->add('canton')
                ->add('type')
                ->add('teams', EntityType::class, array(
                    'class' => 'IcoderBundle:team',
                    'expanded' => TRUE,
                    'multiple' => TRUE,
                    'choice_attr' => function($val, $key, $index) {
                        return ['class' => 'list-group-item'];
                    },
                ));
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
