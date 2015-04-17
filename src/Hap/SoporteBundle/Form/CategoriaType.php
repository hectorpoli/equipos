<?php

namespace Hap\SoporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCategoria','text',array('label' => 'Categoria: ','attr' => array('style' => 'width:200px','placeholder'=> 'Nombre Categoria','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            //->add('Guardar', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\SoporteBundle\Entity\Categoria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hap_soportebundle_categoria';
    }
}
