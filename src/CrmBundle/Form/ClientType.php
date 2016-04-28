<?php
namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class ClientType extends AbstractType{
    public function getName(){
        return 'client_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('firstName', 'text', array(
                'label' => 'Imię'
            ))
            ->add('lastName', 'text', array(
                'label' => 'Nazwisko',
            ))
            ->add('companyName', 'text', array(
                'label' => 'Nazwa firmy',                
                'required' => false
            ))
            ->add('city', 'text', array(
                'label' => 'Miasto',
                'required' => false
            ))
            ->add('postCode', 'text', array(
                'label' => 'Kod pocztowy',
                'required' => false
            ))
            ->add('street', 'text', array(
                'label' => 'Ulica',
                'required' => false
            ))
            ->add('numberBuild', 'text', array(
                'label' => 'Nr budynku',
                'required' => false
            ))
            ->add('email', 'email', array(
                'label' => 'E-mail',
                'required' => false
            ))
            ->add('telNumber', 'text', array(
                'label' => 'Numer telefonu',
            ))
            ->add('pesel', 'number', array(
                'label' => 'Pesel',
                'required' => false
            ))
            ->add('identity', 'text', array(
                'label' => 'Seria/nr dowodu',
                'required' => false
            ))
            ->add('nip', 'number', array(
                'label' => 'NIP',
                'required' => false
            ))
            ->add('regon', 'number', array(
                'label' => 'REGON',
                'required' => false
            ))
            ->add('save', 'submit', array(
                'label' => 'Zapisz',
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
