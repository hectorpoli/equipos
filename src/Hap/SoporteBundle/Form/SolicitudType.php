<?php

namespace Hap\SoporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Hap\SoporteBundle\Entity\Categoria;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;

use Symfony\Bridge\Doctrine\RegistryInterface;

class SolicitudType extends AbstractType
{
    private $doctrine;
    public function __construct(RegistryInterface $doctrine) {
        $this->doctrine=$doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria','entity',array('class'=> 'HapSoporteBundle:Categoria',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                        //->groupBy('c.nombreCategoria');
                },
                'placeholder' => 'Seleccione una opción',
                'attr' => array('style' => 'width:400px')))
            //->add('cantidad','choice',array('choices'  => array('0' => 'Seleccione una opción'),'label'=>'Cantidad:','attr' => array('style' => 'width:200px')))
            //->add('usuarioSolicito','hidden')
            ->add('fechaInicio','date', array('data' => new \DateTime()))
            ->add('fechaEntrega','date', array('data' => new \DateTime()))
            //->add('fechaSolicitud','date', array('data' => new \DateTime()))
            ->add('comentario',null,array('label' => 'Comentario: ','attr' => array('style' => 'width:400px','placeholder'=> 'Comentario relacionado con la solicitud','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('estatus','choice',array('label' => 'Estatus Solicitud: ','choices'  => array('1' => 'Por Asignar', '2' => 'Asignada', '3' => 'Negada'),'attr' => array('style' => 'width:200px','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('destino','choice',array('choices'  => array('1' => 'Interno', '2' => 'Externo'),'attr' => array('style' => 'width:400px')))
            //->add('idTecnico')
            ;
            
                
            $formModifier = function (FormInterface $form, Categoria $categoria = null) {
                //$cantidad = null === $categoria ? array() : array('1'=>'1','2'=>'2');
                
                
                $categoria_id = ($categoria === null) ? array() : $categoria->getId();
                //$em = $this->getDoctrine()->getManager();
                //$cantidad = $em->getRepository('HapSoporteBundle:Producto')->getNProductosAction($categoria_id);
                $cantidad = $this->doctrine->getRepository('HapSoporteBundle:Producto')->getNProductosAction($categoria_id);
                
                $form->add('cantidad', 'choice', array(
                    'placeholder' => 'Seleccione una opción',
                    //'class' => 'HapSoporteBundle:Producto',
                    'choices'     => $cantidad,
                    'label'=>'Cantidad:',
                    'attr' => array('style' => 'width:200px')
                ));
            };

            $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (\Symfony\Component\Form\FormEvent $event) use ($formModifier) {
                    $data = $event->getData();
                    $formModifier($event->getForm(), $data->getCategoria());
                }
            );

            $builder->get('categoria')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                    $categoria = $event->getForm()->getData();
                    $formModifier($event->getForm()->getParent(), $categoria);
                }
            );
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\SoporteBundle\Entity\Solicitud'
        ));
    }

    public function getName()
    {
        return 'hap_soportebundle_solicitud';
    }
}
