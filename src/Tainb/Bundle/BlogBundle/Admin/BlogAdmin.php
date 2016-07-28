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
            ->add('title')
            ->add('category', 'sonata_type_model', array())
            ->add('description')
            ->add('content', 'sonata_formatter_type', array(
            'source_field'         => 'rawContent',
            'source_field_options' => array('attr' => array('class' => 'span10', 'rows' => 20)),
            'format_field'         => 'contentFormatter',
            'target_field'         => 'content',
            'ckeditor_context'     => 'default',
            'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher()
        ));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('description')
            ->add('category')
        ;
//        $listMapper->add('content');
    }
}