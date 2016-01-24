<?php

namespace Lizuk\SocialBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Lizuk\SocialBundle\Entity\News;

class NewsController extends CRUDController
{
    public function indexAction()
    {
        $newses = $this->getDoctrine()->getManager()->getRepository('LizukSocialBundle:News')->findAllOrderedByTitle();

        return $this->render('LizukSocialBundle:News:index.html.twig', array('newses' => $newses));
    }
}
