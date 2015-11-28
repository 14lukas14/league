<?php

namespace Lizuk\MatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LizukMatchBundle:Default:index.html.twig', array('name' => $name));
    }
}
