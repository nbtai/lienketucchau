<?php

// src/AppBundle/Admin/CategoryAdmin.php
namespace Tainb\Bundle\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('content') // source content
            ->add('contentFormatter', 'sonata_formatter_type', array(
            'source_field' => 'content',
            'target_field' => 'content'
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('content');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('content');
    }
}