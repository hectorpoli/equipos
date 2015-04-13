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
        
        $mensaje="";
        
        if ($form->isValid()) {
            $reg = $form->getData();
            $em->persist($reg);
            $em->flush();
            
            return $this->redirectToRoute('_nueva_categoria',array('st' => '1'));
        }
        
        if ($request->query->get('st'))
            return array('form' => $form->createView(),'st' => $request->query->get('st'));
        else
            return array('form' => $form->createView(),'st' => '-1');
    }

    /**
     * @Route("/Categoria",name="_categoria")
     * @Template()
     */
    public function CategoriaAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT c FROM HapSoporteBundle:Categoria c";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1)/*page number*/,
            2/*limit per page*/
        );
        return array('pagination' => $pagination);
        
    }

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
