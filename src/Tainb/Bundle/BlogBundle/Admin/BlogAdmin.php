<?php

namespace Tainb\Bundle\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
            ->add('description', 'text')
            ->add('content', 'sonata_formatter_type_selector', array(
                'source_field'         => 'content',
                'source_field_options' => array('attr' => array('class' => 'span10', 'rows' => 20)),
                'format_field'         => 'content',
                'target_field'         => 'formatted_description',
                'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher(),
            ))
            ->add('category', 'entity', array(
                'class' => 'Tainb\Bundle\CategoryBundle\Entity\Category',
                'property' => 'name',
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title', null, array('editable' => true))
            ->add('description', null, array('editable' => true))
            ->add('category.name')
            ->add('createdAt')
            ->add('updatedAt')

        ;
    }
}