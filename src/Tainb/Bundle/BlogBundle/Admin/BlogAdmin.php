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
            ->add('content', 'textarea')
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