<?php

namespace Lizuk\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LizukSocialBundle:Default:index.html.twig', array('name' => $name));
    }
}
