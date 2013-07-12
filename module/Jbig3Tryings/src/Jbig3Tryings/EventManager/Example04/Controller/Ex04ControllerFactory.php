<?php

namespace Jbig3Tryings\EventManager\Example04\Controller;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Tryings\EventManager\Example04\Controller\Ex04Controller;

class Ex04ControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $ctr = new Ex04Controller();

        $ctr->setTriggerService(
            $sl->getServiceLocator()
                ->get('TriggerServiceFactory-ex04-evm-jbig3tryings')
        );

        return $ctr;
    }

}
