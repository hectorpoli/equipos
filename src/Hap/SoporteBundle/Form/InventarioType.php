<?php

namespace Hap\SoporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InventarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('producto',null,array('attr' => array('style' => 'width:400px')))
            ->add('cantidad','text',array('label' => 'Cantidad: ','attr' => array('style' => 'width:200px','placeholder'=> 'Cantidad de equipos','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('fechaCarga','date', array('data' => new \DateTime()))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\SoporteBundle\Entity\Inventario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hap_soportebundle_inventario';
    }
}
