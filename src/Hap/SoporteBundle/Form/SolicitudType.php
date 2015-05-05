<?php

namespace Hap\SoporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Hap\SoporteBundle\Entity\Categoria;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class SolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria','entity',array('class'=> 'HapSoporteBundle:Categoria',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                        //->groupBy('c.nombreCategoria');
                },
                'attr' => array('style' => 'width:400px')))
            //->add('cantidad','choice',array('choices'  => array('0' => 'Seleccione una opción'),'label'=>'Cantidad:','attr' => array('style' => 'width:200px')))
            //->add('id_usuario_solicito')
            ->add('fechaInicio','date', array('data' => new \DateTime()))
            ->add('fechaEntrega','date', array('data' => new \DateTime()))
            //->add('fechaSolicitud','date', array('data' => new \DateTime()))
            ->add('comentario',null,array('label' => 'Comentario: ','attr' => array('style' => 'width:400px','placeholder'=> 'Comentario relacionado con la solicitud','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            //->add('estatus','choice',array('label' => 'Estatus Solicitud: ','choices'  => array('1' => 'Por Asignar', '2' => 'Asignada', '3' => 'Negada'),'attr' => array('style' => 'width:200px','class'=> 'form-control','aria-describedby'=> 'sizing-addon2')))
            ->add('destino','choice',array('choices'  => array('1' => 'Interno', '2' => 'Externo'),'attr' => array('style' => 'width:400px')))
            //->add('idTecnico')
            ;
            
                
            $formModifier = function (FormInterface $form, Categoria $categoria = null) {
                //$positions = null === $categoria ? array() : array('1'=>'1','2'=>'2');
                
                $categoria_id = ($categoria === null) ? array() : $categoria->getId();
                $em = $this->getDoctrine()->getManager();
                $cantidad = $em->getRepository('HapSoporteBundle:Producto')->getNProductosAction($categoria_id);
                
                $form->add('cantidad', 'choice', array(
                    'placeholder' => '',
                    'choices'     => $cantidad,
                ));
            };

            $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (\Symfony\Component\Form\FormEvent $event) use ($formModifier) {
                    // this would be your entity, i.e. SportMeetup
                    $data = $event->getData();

                    $formModifier($event->getForm(), $data->getCategoria());
                }
            );

            $builder->get('categoria')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                    // It's important here to fetch $event->getForm()->getData(), as
                    // $event->getData() will get you the client data (that is, the ID)
                    $categoria = $event->getForm()->getData();

                    // since we've added the listener to the child, we'll have to pass on
                    // the parent to the callback functions!
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
