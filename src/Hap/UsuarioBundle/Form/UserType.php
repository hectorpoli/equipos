<?php

namespace Hap\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('roles', 'choice', array('label' => 'Rol', 'required' => true, 
                           'choices' => array( 'ROLE_ADMIN' => 'ADMINISTRADOR','ROLE_SUPERADMIN' => 'SUPERADMINISTRADOR', 
                                               'ROLE_USER' => 'USUARIO','ROLE_SOPORTE' => 'SOPORTE','ROLE_DESARROLLO' => 'DESARROLLO'), 'multiple' => true));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\UsuarioBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'hap_usuariobundle_user';
    }
}
