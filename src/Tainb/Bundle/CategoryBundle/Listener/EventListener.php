<?php

namespace Tainb\Bundle\CategoryBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;

class EventListener
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        $entity->setCreatedAt(new \DateTime());
        $entity->setUpdatedAt(new \DateTime());
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        $entity->setUpdatedAt(new \DateTime());
    }
}