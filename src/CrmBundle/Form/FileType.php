<?php
namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class FileType extends AbstractType{
    public function getName(){
        return 'file_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('clientId', 'entity', array(
                'class' => 'CrmBundle:Client',
                'label' => 'Klient',
                'choice_label' => 'companyName',
            ))   
            ->add('file', 'file', array(
                    'label' => 'Plik'
                ))
            ->add('submit', 'submit', array(
                'label' => 'Dodaj',
                'attr' => array(
                    'class'=> 'btn btn-info'
                )
            ));
    }
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CrmBundle\Entity\File'
        ));
    }
}
