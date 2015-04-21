<?php

namespace Hap\SoporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreProducto','text',array('label' => 'Nombre Producto: ','attr' => array('style' => 'width:200px','placeholder'=> 'Nombre Producto','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('modelo','text',array('label' => 'Modelo: ','attr' => array('style' => 'width:200px','placeholder'=> 'Modelo del Producto','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('fechaCarga')
            ->add('categoria',null,array('attr' => array('style' => 'width:400px')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\SoporteBundle\Entity\Producto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hap_soportebundle_producto';
    }
}
