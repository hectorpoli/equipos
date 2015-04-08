<?php

namespace Hap\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Hap\SoporteBundle\Form\CategoriaType;

class InventarioController extends Controller
{
    /**
     * @Route("/nuevaCategoria",name="_nueva_categoria")
     * @Template()
     */
    public function nuevaCategoriaAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $form = $this->createForm(new CategoriaType());
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/Categoria")
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
