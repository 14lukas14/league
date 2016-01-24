<?php

namespace Lizuk\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LizukUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
