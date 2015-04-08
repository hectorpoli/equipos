<?php

namespace Hap\SoporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HapSoporteBundle:Default:index.html.twig', array('name' => $name));
    }
}
