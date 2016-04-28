<?php
namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class ProjectType extends AbstractType{
    public function getName(){
        return 'project_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('clientId', 'entity', array(
                'class' => 'CrmBundle:Client',
                'choice_label' => 'companyName',
            ))
            ->add('nameProject', 'text', array(
                'label' => 'Nazwa projektu'
            ))
            ->add('captionProject', 'textarea', array(
                'label' => 'Opis projektu',
                'attr' => array(
                    'rows' => 5,
                ),
            ))
            ->add('urlTest', 'text', array(
                'label' => 'Domena testowa',                
                'required' => false
            ))
            ->add('urlProd', 'text', array(
                'label' => 'Domena produkcyjna',
                'required' => false
            ))
            ->add('ftpLogin', 'text', array(
                'label' => 'Login FTP',
                'required' => false
            ))
            ->add('ftpPass', 'password', array(
                'label' => 'Haslo FTP',
                'required' => false
            ))
            ->add('status', 'choice', array(
                'label' => 'Status',
                'choices' => array(
                    '0' => 'Ustalenia',
                    '10' => 'Rozpoczęcie',
                    '30' => 'Grafik',
                    '50' => 'Front-end',
                    '70' => 'Back-end',
                    '90' => 'Poprawki',
                    '100' => 'Zakończony',
                ),
            ))
            ->add('date', 'date', array(
                'label' => 'Deadline',
                'input' => 'datetime',
                'widget' => 'choice',
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
            'data_class' => 'CrmBundle\Entity\Project'
        ));
    }
}
