<?php
namespace App\EventSubscriber;

use App\Entity\Attachements;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    
   
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setProperty'],
        ];
    }

    public function setProperty(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Attachements)) {
            return;
        }
        $entity = $this->id->getmygid($entity->getId());
    }
}