<?php

namespace Hap\SoporteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InventarioControllerTest extends WebTestCase
{
    public function testNuevacategoria()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/nuevaCategoria');
    }

    public function testCategoria()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Categoria');
    }

    public function testCargarproducto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cargarProducto');
    }

}
