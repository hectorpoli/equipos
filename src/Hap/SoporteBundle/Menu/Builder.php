<?php

namespace Hap\SoporteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Categoria', array('route' => '_categoria'));
        $menu['Categoria']->addChild('Nueva', array('route' => '_nueva_categoria'));


        return $menu;
    }
}