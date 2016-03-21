<?php

namespace ERP\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvProductoType extends AbstractType
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
                    'class'=>'form-control invproductoTextBox',
                       'style'=> 'width:25%;'
                    )))
            ->add('descripcion', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control invproductoTextBox',
                       'style'=> 'width:25%;'
                    )))
            ->add('precioCompra', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control invproductoTextBox',
                       'style'=> 'width:25%;'
                    )))
            ->add('precioVenta', null, array(
                    'required'=>true,
                   'attr'=>array(
                    'class'=>'form-control invproductoTextBox',
                       'style'=> 'width:25%;'
                    )))
            ->add('sku', null, array(
                   'required'=>true,
                  'attr'=>array(
                   'class'=>'form-control invproductoTextBox',
                      'style'=> 'width:25%;'
                   )))
            ->add('serial', null, array(
                   'required'=>true,
                  'attr'=>array(                    
                   'class'=>'form-control invproductoTextBox',
                      'style'=> 'width:25%;'
                   )))
            ->add('inventarioBajo', null, array(
                   'required'=>true,
                  'attr'=>array(
                   'class'=>'form-control invproductoTextBox',
                      'style'=> 'width:25%;'
                   )))
            ->add('totalExistencia', null, array( 
                   'required'=>true,
                  'attr'=>array(
                   'class'=>'form-control invproductoTextBox',
                      'style'=> 'width:25%;'
                   )))
            ->add('invCatProducto', null, array(  
                   'required'=>true,
                  'attr'=>array(
                   'class'=>'form-control invproductoSelect',
                      'style'=> 'width:25%;'
                   )))
            ->add('invTipoInventario', null, array( 
                  'required'=>true,
                 'attr'=>array(
                  'class'=>'form-control invproductoSelect',
                     'style'=> 'width:25%;'
                  )))
            ->add('invZona', null, array(  
                   'required'=>true,
                  'attr'=>array(
                   'class'=>'form-control invproductoSelect',
                      'style'=> 'width:25%;'
                   )))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ERP\AdminBundle\Entity\InvProducto'
        ));
    }
}
