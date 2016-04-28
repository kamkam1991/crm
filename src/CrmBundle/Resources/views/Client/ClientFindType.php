<?php
namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class ClientFindType extends AbstractType{
    public function getName(){
        return 'clientFind_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('city', 'entity', array(
                'class' => 'CrmBundle:Client',
                'choice_label' => 'city',
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
            'data_class' => 'CrmBundle\Entity\Client'
        ));
    }
}
