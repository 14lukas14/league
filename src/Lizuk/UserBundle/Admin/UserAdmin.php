<?php

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-19
 * Time: 19:39
 */
namespace Lizuk\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    protected $baseRoutePattern = 'user';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('pesel', 'text', array('label' => 'Pesel'))
            //->add('gender', 'text', array('label' => 'Płeć'))
            ->add('firstName', 'text', array('label' => 'Imie'))
            ->add('lastName', 'text', array('label' => 'Nazwisko'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('pesel')
            ->add('gender')
            ->add('firstName')
            ->add('lastName')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('pesel')
            ->add('gender')
            ->add('firstName')
            ->add('lastName')
        ;
    }
}