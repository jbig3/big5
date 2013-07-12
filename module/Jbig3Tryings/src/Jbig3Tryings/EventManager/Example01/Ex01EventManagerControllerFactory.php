<?php
namespace Jbig3Tryings\EventManager\Example01;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\EventManager\Controller\EventManagerController;

class Ex01EventManagerControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $ctr = new EventManagerController();

        $ctr->setTrigger(
            $serviceLocator->getServiceLocator()
                ->get('TriggerFactory-ex01-evm-jbig3tryings')
        );

        return $ctr;
    }

}