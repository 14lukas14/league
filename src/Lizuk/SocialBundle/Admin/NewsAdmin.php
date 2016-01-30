<?php

namespace Lizuk\SocialBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class NewsAdmin extends Admin
{
    protected $baseRoutePattern = 'news';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('index'); // Action gets added automatically
    }

    public function getPersistentParameters()
    {
        if (!$this->getRequest()) {
            return array();
        }

        return array(
            '_sonata_admin'  => $this->getRequest()->get('_sonata_admin', $this->getCode()),
        );
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Tytuł'))
            ->add('description', 'text', array('label' => 'Opis'))
            ->add('introduction', 'text', array('label' => 'Wstęp'))
            ->add('author', 'entity', array('class' => 'Lizuk\UserBundle\Entity\User'))
            ->add('body') //if no type is specified, SonataAdminBundle tries to guess it
            ->add('image')
            ->add('source', 'text', array('label' => 'Źródło'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('author')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('author')
        ;
    }
}