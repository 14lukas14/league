<?php

namespace Lizuk\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->get('monolog.logger.channel')->info('Główna');
        return $this->render('LizukMainBundle:Default:index.html.twig');
    }
}
