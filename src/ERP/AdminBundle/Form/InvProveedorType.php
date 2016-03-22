<?php

namespace ERP\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvProveedorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control proveedorTextBox'
                    )))
             ->add('direccion', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control proveedorTextBox'
                    )))
          ->add('crmIndustriaCliente', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control proveedorSelect'
                    )))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ERP\AdminBundle\Entity\InvProveedor'
        ));
    }
}
