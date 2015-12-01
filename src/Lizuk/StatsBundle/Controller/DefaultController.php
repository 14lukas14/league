<?php

namespace Lizuk\StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LizukStatsBundle:Default:index.html.twig', array('name' => $name));
    }
}
