<?php

namespace Hap\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Hap\SoporteBundle\Form\CategoriaType;
use Hap\SoporteBundle\Entity\Categoria;

class InventarioController extends Controller
{
    /**
     * @Route("/nuevaCategoria",name="_nueva_categoria")
     * @Template()
     */
    public function nuevaCategoriaAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new CategoriaType(),new Categoria());
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $reg = $form->getData();
            $em->persist($reg);
            $em->flush();
            
            return $this->redirectToRoute('_nueva_categoria');
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/Categoria",name="_categoria")
     * @Template()
     */
    public function CategoriaAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/cargarProducto")
     * @Template()
     */
    public function cargarProductoAction()
    {
        return array(
                // ...
            );    }

}
