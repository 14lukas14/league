<?php

namespace Lizuk\LeagueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LizukLeagueBundle:Default:index.html.twig', array('name' => $name));
    }
}
