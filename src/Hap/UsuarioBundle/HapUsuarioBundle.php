<?php

namespace Hap\UsuarioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HapUsuarioBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
