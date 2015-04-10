<?php

namespace Hap\SoporteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        
        
        $menu->addChild('Categoria', array('route' => '_categoria'))
                ->setAttribute('dropdown', true)
                ->setAttribute('icon', 'icon-list');
        $menu['Categoria']->addChild('Nueva Categoria',array('route' => '_nueva_categoria'))
                ->setAttribute('icon', 'icon-list');


        return $menu;
    }
}