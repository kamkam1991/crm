<?php
namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class TimelineType extends AbstractType{
    public function getName(){
        return 'timeline_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('ClientId', 'entity', array(
                'class' => 'CrmBundle:Client',
                'choice_label' => 'companyName',
            ))
            ->add('type', 'choice', array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Typ kontaktu',
                ),
                'choices' => array(
                    '0' => 'Określenie zapotrzebowań',
                    '1' => 'Przedstawienie cennika',
                    '2' => 'Negocjacje',
                    '3' => 'Podpianie umowy',
                    '4' => 'Poprawki',
                    '4' => 'Hosting',
                    '6' => 'Zakończenie tranzakcji',
                ),
            ))
            ->add('date', 'date', array(
                'label' => false,
                'input' => 'datetime',
                'widget' => 'choice',
            ))
            ->add('content', 'textarea', array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Typ kontaktu',
                ),
                'required' => false
            ))
            ->add('save', 'submit', array(
                'label' => 'Szukaj',
                'attr' => array(
                    'class'=> 'btn btn-success'
                )
            ));
    }
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CrmBundle\Entity\Timeline'
        ));
    }
}
