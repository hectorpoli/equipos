<?php

namespace Hap\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder
            ->add('name','text',array('label' => 'Nombre:'))
            ->add('roles', 'choice', array('label' => 'Rol', 'required' => true, 
                           'choices' => array( 'ROLE_ADMIN' => 'ADMINISTRADOR','ROLE_SUPERADMIN' => 'SUPERADMINISTRADOR', 
                                               'ROLE_USER' => 'USUARIO','ROLE_SOPORTE' => 'SOPORTE','ROLE_DESARROLLO' => 'DESARROLLO'), 'multiple' => true));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'hap_usuario_registration';
    }
}

