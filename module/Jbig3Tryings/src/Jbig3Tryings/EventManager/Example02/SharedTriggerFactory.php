<?php

namespace Jbig3Tryings\EventManager\Example02;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\EventManager\SharedEventManager;
use Jbig3Tryings\EventManager\Example02\SharedTrigger;

class SharedTriggerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sharedTrigger = new SharedTrigger();

        $sharedEventManager = $sl->get('sharedEventManager');
        $sharedEventManager
            ->attach(
            'SharedTrigger',
            'getGreeting',
            function ($e) use ($sl) {
                $sl
                    ->get('loggingTask-task-evm-jbig3tryings')
                    ->onGetGreeting($e);
            }
        );

        $eventManager = $sl->get('eventManager');
        $eventManager->setSharedManager($sharedEventManager);

        $sharedTrigger->setEventManager($eventManager);

        return $sharedTrigger;
    }
}